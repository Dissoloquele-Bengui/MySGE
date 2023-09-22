<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class AlunoController extends Controller
{
    //
    //

    
    //
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
        echo 'Olá Mundo';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $request->validate([
            'vc_nome' => 'required|max:255',
        ], [
            'vc_nome.required' => 'O nome da Aluno é um campo obrigatório.',
        ]);

         try {

            $aluno = Aluno::create([
                'vc_nome' => $request->vc_nome,
            ]);
            $this->loggerData(" Cadastrou a Aluno " . $request->vc_nome);
            return redirect()->back()->with('Aluno.create.success',1);
         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Aluno.create.error',1);
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
        $data["Aluno"] = Aluno::find($id);

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
        // dd($request);
        $request->validate([
            'vc_nome' => 'required|max:255'],[
            'vc_nome.required' => 'O nome da Aluno é um campo obrigatório.',
        ]);

         try {
            //code...
            

            $aluno = Aluno::findOrFail($id)->update([
                'vc_nome' => $request->vc_nome]);
            $this->loggerData(" Editou a Aluno  de id, Aluno ($aluno->id, $aluno->vc_nome) para ($request->vc_nome)");

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
            $this->loggerData(" Eliminou a Aluno  de id, fisciplina ($aluno->vc_nome) ");
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
            $this->loggerData(" Purgou a Aluno  de id, Aluno ($aluno->vc_nome) ");
            return redirect()->back()->with('Aluno.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Aluno.purge.error',1);
        }
    }
}
