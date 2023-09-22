<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Turma;
use App\Models\AnoLectivo;
use App\Models\Curso;
use App\Models\Classe;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class MatriculaController extends Controller
{
    //
    //


    //
    public function index()
    {
        $data['matriculas'] = Matricula::join('alunos', 'matriculas.aluno_id', '=', 'alunos.id')
        ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
        ->join('classes', 'turmas.idClasse', '=', 'classes.id')
        ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
        ->join('cursos', 'cursos.id', '=', 'turmas.idCurso')
        ->select('matriculas.*', 'alunos.primeiro_nome as primeiro', 'alunos.ultimo_nome as ultimo', 'alunos.nome_meio as meio', 'turmas.nome as turma', 'ano_lectivos.data_inicio as data_inicio', 'ano_lectivos.data_fim', 'cursos.nome as curso', 'classes.nome as classe')
        ->whereColumn('turmas.id', '=', 'matriculas.turma_id')
        ->get();

        //dd($data['matriculas']);
        return view('admin.matricula.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dados['alunos']=Aluno::all();
        $dados['turmas']=Turma::all();
        return view('admin.matricula.create.index',$dados);
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
            $matricula = Matricula::create([
                'aluno_id' => $request->aluno_id,
                'turma_id' => $request->turma_id,
            ]);
            //dd($matricula);

            return redirect()->back()->with('Matricula.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Matricula.create.error', 1);
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
        $matriculas = Matricula::all();
        return view('admin.matricula.edit.index',['matriculas'=>$matriculas,'anos'=>$anos,'cursos'=>$cursos,'classes'=>$classes]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dados['alunos']=Aluno::all();
        $dados['turmas']=Turma::all();
        $dados["matricula"] = Matricula::join('alunos', 'matriculas.aluno_id', '=', 'alunos.id')
        ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
        ->join('classes', 'turmas.idClasse', '=', 'classes.id')
        ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
        ->join('cursos', 'cursos.id', '=', 'turmas.idCurso')
        ->select('matriculas.*', 'alunos.primeiro_nome as primeiro', 'alunos.ultimo_nome as ultimo', 'alunos.nome_meio as meio', 'turmas.nome as turma', 'ano_lectivos.data_inicio as data_inicio', 'ano_lectivos.data_fim', 'cursos.nome as curso', 'classes.nome as classe')
        ->whereColumn('turmas.id', '=', 'matriculas.turma_id')->findOrFail($id);
        return view('admin.matricula.edit.index',$dados);
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


            $matricula = Matricula::findOrFail($id)->update([
                'aluno_id' => $request->aluno_id,
                'turma_id' => $request->turma_id,
            ]);

            return redirect()->back()->with('Matricula.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Matricula.update.error',1);
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
            $matricula = Matricula::findOrFail($id);
            Matricula::findOrFail($id)->delete();
            return redirect()->back()->with('Matricula.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Matricula.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $matricula = Matricula::findOrFail($id);
            Matricula::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Matricula.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Matricula.purge.error',1);
        }
    }
}
