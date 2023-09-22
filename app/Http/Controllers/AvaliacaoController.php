<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Avaliacao;
use App\Models\AnoLectivo;
use App\Models\Curso;
use App\Models\Classe;
use App\Models\Disciplina;
use App\Models\Matricula;
use App\Models\Trimestre;
use App\Models\Turma;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class AvaliacaoController extends Controller
{
    //
    //


    //

    public function avaliar()
    {
        $dados['disciplinas']=Disciplina::all();
        $dados['turmas']=Turma::join('matriculas','turmas.id','=','matriculas.turma_id')
            ->whereColumn('matriculas.turma_id','turmas.id')
            ->get();
        $dados['trimestres']=Trimestre::all();
        //dd();
        return view('admin.avaliacao.avaliacaoContinua.index',$dados);
    }
    public function lancarAvaliacao(Request $request)
    {

        $dados['disciplina']=Disciplina::where('id',$request->idDisciplina)->first();
        $dados['turma'] = Turma::join('cursos', 'turmas.idCurso', '=', 'cursos.id')
        ->join('classes', 'turmas.idClasse', '=', 'classes.id')
        ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
        ->select('turmas.*', 'cursos.nome as curso', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
        ->where('turmas.id', $request->idTurma)
        ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula')
            ->where('matriculas.turma_id', $request->idTurma)
            ->get();

        foreach ($dados['alunos'] as $aluno) {
            $avaliacoes = Avaliacao::where('matricula_id', $aluno->idMatricula)
            ->where('disciplina_id', $request->idDisciplina)
            ->where('tipo_avaliacao', 'AV')
            ->pluck('valor', 'tipo_avaliacao')
            ->toArray();
            $aluno->avaliacoes = $avaliacoes;
        }
        //dd($dados['alunos']);
        return view('admin.avaliacao.avaliacaoContinua.registar',$dados);
    }
    public function registarAvaliacao(Request $request)
    {
        $notas = $request->input('notas');
            try {
                // Verifica se já existe uma avaliação para essa matricula_id e tipo_avaliacao
                foreach ($notas as $idMatricula => $valores) {
                    $av = $valores['av'];
                    $avaliacao = Avaliacao::where('matricula_id', $idMatricula)
                        ->where('tipo_avaliacao', 'AV')
                        ->where('disciplina_id',$request->disciplina_id)
                        ->first();
                    // Atualiza ou cria uma nova avaliação
                    if ($avaliacao) {
                        $avaliacao->valor = $av;
                        $avaliacao->peso=20;
                        $avaliacao->save();
                    } else {
                        Avaliacao::create([
                            'peso' => 20,
                            'tipo_avaliacao' => 'AV',
                            'disciplina_id' => $request->disciplina_id,
                            'matricula_id' => $idMatricula,
                            'valor' => $av,
                            'id_trimestre'=>1
                        ]);
                    }
                }
                return redirect()->route('admin.avaliacao.prova')->with('Avaliacao.update.success', 1);
            } catch (\Throwable $th) {
                dd($th);
                return redirect()->route('admin.avaliacao.prova')->withInput()->with('Avaliacao.create.error', 1);
            }
    }
    public function prova()
    {
        $dados['disciplinas']=Disciplina::all();
        $dados['turmas']=Turma::join('matriculas','turmas.id' ,'=','matriculas.turma_id')->whereColumn('matriculas.turma_id','turmas.id')->get();
        $dados['trimestres']=Trimestre::all();
        return view('admin.avaliacao.prova.index',$dados);
    }
    public function lancarProva(Request $request)
    {
        $dados['disciplina']=Disciplina::where('id',$request->idDisciplina)->first();
        $dados['turma'] = Turma::join('cursos', 'turmas.idCurso', '=', 'cursos.id')
        ->join('classes', 'turmas.idClasse', '=', 'classes.id')
        ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
        ->select('turmas.*', 'cursos.nome as curso', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
        ->where('turmas.id', $request->idTurma)
        ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula')
            ->where('matriculas.turma_id', $request->idTurma)
            ->get();

        foreach ($dados['alunos'] as $aluno) {
            $avaliacoes = Avaliacao::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id', $request->idDisciplina)
                ->pluck('valor', 'tipo_avaliacao')
                ->toArray();
            $aluno->avaliacoes = $avaliacoes;
        }
        //dd($dados['alunos']);

        return view('admin.avaliacao.prova.registar', $dados);
    }
    public function verProva()
    {
        $dados['disciplinas']=Disciplina::all();
        $dados['turmas']=Turma::join('matriculas','turmas.id' ,'=','matriculas.turma_id')->whereColumn('matriculas.turma_id','turmas.id')->get();
        $dados['trimestres']=Trimestre::all();
        return view('admin.avaliacao.prova.nota.index',$dados);
    }
    public function consultarNotaProva(Request $request)
    {
        $dados['disciplina']=Disciplina::where('id',$request->idDisciplina)->first();
        $dados['turma'] = Turma::join('cursos', 'turmas.idCurso', '=', 'cursos.id')
        ->join('classes', 'turmas.idClasse', '=', 'classes.id')
        ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
        ->select('turmas.*', 'cursos.nome as curso', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
        ->where('turmas.id', $request->idTurma)
        ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula')
            ->orderBy('nome')
            ->where('matriculas.turma_id', $request->idTurma)
            ->get();

        foreach ($dados['alunos'] as $aluno) {
            $avaliacoes = Avaliacao::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id', $request->idDisciplina)
                ->pluck('valor', 'tipo_avaliacao')
                ->toArray();
            $aluno->avaliacoes = $avaliacoes;
        }
        //dd($dados['alunos']);

        return view('admin.avaliacao.prova.nota.ver', $dados);
    }



    public function registarProva(Request $request, $disciplina_id)
    {
        $notas = $request->input('notas');
        //dd($notas);
            try {
                // Verifica se já existe uma avaliação para essa matricula_id e tipo_avaliacao
                foreach ($notas as $idMatricula => $valores) {
                    $p1 = $valores['p1'];
                    $p2 = $valores['p2'];
                    $av=$valores['av'];
                    $avaliacaoP1 = Avaliacao::where('matricula_id', $idMatricula)
                        ->where('tipo_avaliacao', 'p1')->where('disciplina_id',$disciplina_id)
                        ->first();

                    $avaliacaoP2 = Avaliacao::where('matricula_id', $idMatricula)
                        ->where('tipo_avaliacao', 'p2')->where('disciplina_id',$disciplina_id)
                        ->first();
                    $avaliacaoMAC = Avaliacao::where('matricula_id', $idMatricula)
                    ->where('tipo_avaliacao', 'MAC')->where('disciplina_id',$disciplina_id)
                    ->first();

                    // Atualiza ou cria uma nova avaliação
                    if ($avaliacaoP1) {
                        $avaliacaoP1->valor = $p1;
                        $avaliacaoP1->save();
                    } else {
                        Avaliacao::create([
                            'peso' => 20,
                            'tipo_avaliacao' => 'p1',
                            'disciplina_id' => $disciplina_id,
                            'matricula_id' => $idMatricula,
                            'valor' => $p1,
                            'id_trimestre' => 1
                        ]);
                    }

                    if ($avaliacaoP2) {
                        $avaliacaoP2->valor = $p2;
                        $avaliacaoP2->save();
                    } else {
                        Avaliacao::create([
                            'peso' => 20,
                            'tipo_avaliacao' => 'p2',
                            'disciplina_id' => $disciplina_id,
                            'matricula_id' => $idMatricula,
                            'valor' => $p2,
                            'id_trimestre' => 1
                        ]);
                    }
                    if ($avaliacaoMAC) {
                        $avaliacaoMAC->valor = $av;
                        $avaliacaoMAC->save();
                    } else {
                        Avaliacao::create([
                            'peso' => 20,
                            'tipo_avaliacao' => 'MAC',
                            'disciplina_id' => $disciplina_id,
                            'matricula_id' => $idMatricula,
                            'valor' => $av,
                            'id_trimestre'=>1
                        ]);
                    }
                }
                return redirect()->route('admin.avaliacao.prova')->with('Avaliacao.update.success', 1);
            } catch (\Throwable $th) {
                dd($th);
                return redirect()->route('admin.avaliacao.prova')->withInput()->with('Avaliacao.create.error', 1);
            }

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $anos=AnoLectivo::all();
        $cursos=Curso::all();
        $classes=Classe::all();
        return view('admin.avaliacao.create.index',['anos'=>$anos,'cursos'=>$cursos,'classes'=>$classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            //dd($request);
            $avaliacao = Avaliacao::create([
                'nome' => $request->nome,
                'idCurso' => $request->idCurso,
                'idClasse' => $request->idClasse,
                'idAno' => $request->idAno,
            ]);
            //dd($avaliacao);

            return redirect()->back()->with('Avaliacao.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Avaliacao.create.error', 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $anos=AnoLectivo::all();
        $cursos=Curso::all();
        $classes=Classe::all();
        $avaliacaos = Avaliacao::all();
        return view('admin.avaliacao.edit.index',['avaliacaos'=>$avaliacaos,'anos'=>$anos,'cursos'=>$cursos,'classes'=>$classes]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['anos']=AnoLectivo::all();
        $data['cursos']=Curso::all();
        $data['classes']=Classe::all();
        $data["avaliacao"] = Avaliacao::join('classes', 'avaliacaos.idClasse', '=', 'classes.id')
        ->join('ano_lectivos', 'avaliacaos.idAno', '=', 'ano_lectivos.id')
        ->join('cursos', 'cursos.id', '=', 'avaliacaos.idCurso')
        ->select('avaliacaos.*','classes.nome as classe','cursos.nome as curso','ano_lectivos.data_inicio as data_inicio', 'ano_lectivos.data_fim as data_fim', 'ano_lectivos.id as idAno')
        ->findOrFail($id);
        return view('admin.avaliacao.edit.index',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //


         try {
            //code...


            $avaliacao = Avaliacao::findOrFail($id)->update([
                'nome' => $request->nome,
                'idCurso' => $request->idCurso,
                'idClasse' => $request->idClasse,
                'idAno' => $request->idAno,
            ]);

            return redirect()->back()->with('Avaliacao.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Avaliacao.update.error',1);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            $avaliacao = Avaliacao::findOrFail($id);
            Avaliacao::findOrFail($id)->delete();
            return redirect()->back()->with('Avaliacao.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Avaliacao.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $avaliacao = Avaliacao::findOrFail($id);
            Avaliacao::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Avaliacao.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Avaliacao.purge.error',1);
        }
    }
}
