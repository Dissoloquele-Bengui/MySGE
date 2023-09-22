<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Matricula;
use App\Models\Turma;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('admin.aluno.index',['alunos'=>$alunos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['cursos']=Curso::all();
        $data['classes']=Classe::all();
        return view('admin.aluno.create.index',$data);
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
            $aluno = Aluno::create([
                'primeiro_nome' => $request->primeiro_nome,
                'nome_meio' => $request->nome_meio,
                'ultimo_nome' => $request->ultimo_nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'email' => $request->email,
                'numero_bi' => $request->numero_bi,
                'genero' => $request->genero,
                'nacionalidade' => $request->nacionalidade,
                'numero_telefone' => $request->numero_telefone,
                'nome_responsavel' => $request->nome_responsavel,
                'numero_telefone' => $request->numero_telefone,
                'parentesco_responsavel' => $request->parentesco_responsavel,
                'escola_anterior' => $request->escola_anterior,
                'numero_telefone' => $request->numero_telefone,
                'estado_civil' => $request->estado_civil,
                'naturalidade' => $request->naturalidade,
                'provincia' => $request->provincia,
                'deficiencia' => $request->deficiencia,
                'nome_pai' => $request->nome_pai,
                'nome_mae' => $request->nome_mae,
                'contato_responsavel' => $request->contato_responsavel,
            ]);
            $turmas=Turma::where('idCurso',$request->curso)
                ->where('idClasse',$request->classe)
                ->where('idAno',1)
                ->get();

            foreach($turmas as $turma){
                if(Matricula::where('turma_id')->count()<$turma->limite){
                    Matricula::create([
                        'aluno_id'=>$aluno->id,
                        'turma_id'=>$turma->id,
                    ]);
                    return;

                }
            }

            //dd($aluno);

            return redirect()->back()->with('Aluno.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Aluno.create.error', 1);
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
        $alunos = Aluno::all();
        return view('admin.aluno.edit.index',['alunos'=>$alunos]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data["aluno"] = Aluno::find($id);

        return view('admin.aluno.edit.index',$data);
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


            $aluno = Aluno::findOrFail($id)->update([
                'primeiro_nome' => $request->primeiro_nome,
                'nome_meio' => $request->nome_meio,
                'ultimo_nome' => $request->ultimo_nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'email' => $request->email,
                'numero_bi' => $request->numero_bi,
                'genero' => $request->genero,
                'nacionalidade' => $request->nacionalidade,
                'numero_telefone' => $request->numero_telefone,
                'nome_responsavel' => $request->nome_responsavel,
                'numero_telefone' => $request->numero_telefone,
                'parentesco_responsavel' => $request->parentesco_responsavel,
                'escola_anterior' => $request->escola_anterior,
                'numero_telefone' => $request->numero_telefone,
                'estado_civil' => $request->estado_civil,
                'naturalidade' => $request->naturalidade,
                'provincia' => $request->provincia,
                'deficiencia' => $request->deficiencia,
                'nome_pai' => $request->nome_pai,
                'nome_mae' => $request->nome_mae,
                'contato_responsavel' => $request->contato_responsavel,
            ]);

            return redirect()->back()->with('Aluno.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Aluno.update.error',1);
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
            $aluno = Aluno::findOrFail($id);
            Aluno::findOrFail($id)->delete();
            return redirect()->back()->with('Aluno.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Aluno.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $aluno = Aluno::findOrFail($id);
            Aluno::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Aluno.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Aluno.purge.error',1);
        }
    }
}
