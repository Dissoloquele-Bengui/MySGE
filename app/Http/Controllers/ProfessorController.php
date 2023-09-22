<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\DisciplinaProfessor;
use App\Models\CursoProfessor;
use App\Models\TurmaProfessor;
use App\Models\Disciplina;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ProfessorController extends Controller
{
    //
    //


    //
    public function index()
    {
        $professores = Professor::all();
        return view('admin.professor.index',['professores'=>$professores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.professor.create.index');
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
            $professor = Professor::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'numero_identificacao' => $request->numero_identificacao,
                'genero' => $request->genero,
                'area_especializacao' => $request->area_especializacao,
                'data_contratacao' => $request->data_contratacao,
                'salario' => $request->salario,

            ]);
            //dd($professor);

            return redirect()->back()->with('Professor.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Professor.create.error', 1);
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
        $professores = Professor::all();
        return view('admin.professor.edit.index',['professores'=>$professores]);
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
        $data["professor"] = Professor::find($id);

        return view('admin.professor.edit.index',$data);
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


            $professor = Professor::findOrFail($id)->update([
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'data_nascimento' => $request->data_nascimento,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'numero_identificacao' => $request->numero_identificacao,
                'genero' => $request->genero,
                'area_especializacao' => $request->area_especializacao,
                'data_contratacao' => $request->data_contratacao,
                'salario' => $request->salario,
            ]);

            return redirect()->back()->with('Professor.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.update.error',1);
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
        try {
            //code...
            $professor = Professor::findOrFail($id);
            Professor::findOrFail($id)->delete();
            return redirect()->back()->with('Professor.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $professor = Professor::findOrFail($id);
            Professor::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Professor.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.purge.error',1);
        }
    }
    /*Start Vinculo Professor Disciplinas */

    public function listarVinculoDisciplina($id)
    {
        $dados['professorDisciplinas'] = DisciplinaProfessor::join('disciplinas','disciplina_professors.disciplina_id','=','disciplinas.id')
        ->join('professors','disciplina_professors.professor_id','=','professors.id')
        ->select('disciplina_professors.*','professors.nome as professor','disciplinas.nome as disciplina','disciplinas.codigo as codigo')
        ->where('professor_id',$id)
        ->get();
        //dd($dados['professorDisciplinas']);
        return view('admin.professor.disciplina.index',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVinculoDisciplina($id)
    {
        //
        $dados['disciplinas']=Disciplina::all();
        $dados['professores']=Professor::find($id);

        return view('admin.professor.disciplina.create.index',$dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVinculoDisciplina(Request $request)
    {

        try {
            //dd($request);
            $professorDisciplina = DisciplinaProfessor::create([
                'professor_id' => $request->professor_id,
                'disciplina_id' => $request->disciplina_id,
            ]);
            //dd($professor);

            return redirect()->back()->with('Professor.disciplina.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Professor.disciplina.create.error', 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showVinculoDisciplina()
    {
        $professores = Professor::all();
        return view('admin.professor.disciplina.edit.index',['professores'=>$professores]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editVinculoDisciplina($id)
    {
        //
        //dd($id);
        $dados['disciplinas']=Disciplina::all();
        $dados['professorDisciplina']=DisciplinaProfessor::join('disciplinas','disciplina_professors.disciplina_id','=','disciplinas.id')
        ->join('professors','disciplina_professors.professor_id','=','professors.id')
        ->select('disciplina_professors.*','professors.nome as professor','disciplinas.nome as disciplina','disciplinas.codigo as codigo')
        ->where('disciplina_professors.id',$id)
        ->first();
        //dd($dados['professorDisciplina']);
        return view('admin.professor.disciplina.edit.index',$dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVinculoDisciplina(Request $request, $id)
    {
         try {
            //dd($id);
            $professorDisciplina = DisciplinaProfessor::findOrFail($id)->update([
                'professor_id' => $request->professor_id,
                'disciplina_id' => $request->disciplina_id,
            ]);

            return redirect()->back()->with('Professor.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.disciplina.update.error',1);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVinculoDisciplina($id)
    {
        try {
            //code...
            $professorDisciplina = DisciplinaProfessor::findOrFail($id);
            DisciplinaProfessor::findOrFail($id)->delete();
            return redirect()->back()->with('Professor.disciplina.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.disciplina.destroy.error',1);
        }
    }

    public function purgeVinculoDisciplina($id)
    {
        //
        try {
            //code...
            $professor = DisciplinaProfessor::findOrFail($id);
            DisciplinaProfessor::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Professor.disciplina.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.disciplina.purge.error',1);
        }
    }
    /*End Vinculo Professor Disciplinas */

    /*Start Vinculo Professor Disciplinas */

    public function listarVinculoTurma()
    {
        $dados['professorCursos'] = CursoProfessor::join('cursos','curso_professors.curso_id','=','cursos.id')
        ->join('professors','curso_professors.professor_id','=','professors.id')
        ->select('curso_professors.*','professors.nome as professor','cursos.nome as curso','cursos.codigo as codigo')
        ->where('professor_id',$id)
        ->get();
        return view('admin.professor.curso.index',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVinculoTurma($id)
    {
        //
        $dados['cursos']=Curso::all();
        $dados['professor']=Professor::find($id);
        return view('admin.professor.curso.create.index',$dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVinculoTurma(Request $request)
    {

        try {
            //dd($request);
            $professorCurso = CursoProfessor::create([
                'professor_id' => $request->professor_id,
                'curso_id' => $request->curso_id,
            ]);
            //dd($professor);

            return redirect()->back()->with('Professor.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Professor.create.error', 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showVinculoTurma()
    {

        return view('admin.professor.edit.index',$dados);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editVinculoTurma($id)
    {
        //
        $dados['professorCursos'] = CursoProfessor::join('cursos','curso_professors.curso_id','=','cursos.id')
        ->join('professors','curso_professors.professor_id','=','professors.id')
        ->select('curso_professors.*','professors.nome as professor','cursos.nome as curso','cursos.codigo as codigo')
        ->where('professor_id',$id)
        ->get();

        $dados['cursos']=Curso::all();

        return view('admin.professor.curso.edit.index',$dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVinculoTurma(Request $request, $id)
    {
        //
            //


            try {
            //code...


            $professor = CursoProfessor::findOrFail($id)->update([
                'professor_id' => $request->professor_id,
                'curso_id' => $request->curso_id,
            ]);

            return redirect()->back()->with('Professor.update.success',1);

            } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.update.error',1);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVinculoTurma($id)
    {
        try {
            //code...
            $professor = CursoProfessor::findOrFail($id);
            CursoProfessor::findOrFail($id)->delete();
            return redirect()->back()->with('Professor.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.destroy.error',1);
        }
    }

    public function purgeVinculoTurma($id)
    {
        //
        try {
            //code...
            $professor = CursoProfessor::findOrFail($id);
            CursoProfessor::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Professor.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.purge.error',1);
        }
    }
    /*End Vinculo Professor Turmas */

    /*Start Vinculo Professor Cursos */

    public function listarVinculoCurso()
    {
        $professores = Professor::all();
        return view('admin.professor.index',['professores'=>$professores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVinculoCurso()
    {
        //
        return view('admin.professor.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVinculoCurso(Request $request)
    {

        try {
            //dd($request);
            $professor = Professor::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'numero_identificacao' => $request->numero_identificacao,
                'genero' => $request->genero,
                'area_especializacao' => $request->area_especializacao,
                'data_contratacao' => $request->data_contratacao,
                'salario' => $request->salario,

            ]);
            //dd($professor);

            return redirect()->back()->with('Professor.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Professor.create.error', 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showVinculoCurso()
    {
        $professores = Professor::all();
        return view('admin.professor.edit.index',['professores'=>$professores]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editVinculoCurso($id)
    {
        //
        $data["professor"] = Professor::find($id);

        return view('admin.professor.edit.index',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVinculoCurso(Request $request, $id)
    {
        //
         //


         try {
            //code...


            $professor = Professor::findOrFail($id)->update([
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'data_nascimento' => $request->data_nascimento,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'numero_identificacao' => $request->numero_identificacao,
                'genero' => $request->genero,
                'area_especializacao' => $request->area_especializacao,
                'data_contratacao' => $request->data_contratacao,
                'salario' => $request->salario,
            ]);

            return redirect()->back()->with('Professor.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.update.error',1);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVinculoCurso($id)
    {
        try {
            //code...
            $professor = Professor::findOrFail($id);
            Professor::findOrFail($id)->delete();
            return redirect()->back()->with('Professor.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.destroy.error',1);
        }
    }

    public function purgeVinculoCurso($id)
    {
        //
        try {
            //code...
            $professor = Professor::findOrFail($id);
            Professor::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Professor.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Professor.purge.error',1);
        }
    }
    /*End Vinculo Professor Cursos */

}
