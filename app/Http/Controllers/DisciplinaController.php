<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disciplina;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DisciplinaController extends Controller
{
    // ...

    public function index()
    {
        $disciplinas = Disciplina::all();
        return view('admin.disciplina.index', ['disciplinas' => $disciplinas]);
    }

    public function create()
    {
        return view('admin.disciplina.create.index');
    }

    public function store(Request $request)
    {
        //dd($request);


        try {
            //dd($request);
            $disciplina = Disciplina::create([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
            ]);
            //dd($disciplina);

            return redirect()->back()->with('Disciplina.create.success', 1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Disciplina.create.error', 1);
        }
    }

    public function show()
    {
        $disciplinas = Disciplina::all();
        return view('admin.disciplina.edit.index', ['disciplinas' => $disciplinas]);
    }

    public function edit($id)
    {
        $data["disciplina"] = Disciplina::find($id);

        return view('admin.disciplina.edit.index', $data);
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        try {
            $disciplina = Disciplina::findOrfail($id)->update([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
            ]);


            return redirect()->back()->with('Disciplina.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Disciplina.create.error', 1);
        }
    }

    public function destroy($id)
    {
        try {
            //code...
            $disciplina = Disciplina::findOrFail($id);
            Disciplina::findOrFail($id)->delete();
            $this->loggerData(" Eliminou a Disciplina  de id, fisciplina ($disciplina->nome) ");
            return redirect()->back()->with('Disciplina.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Disciplina.destroy.error',1);
        }
    }

    public function purge($id)
    {
        try {
            //code...
            $disciplina = Disciplina::findOrFail($id);
            Disciplina::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou a Disciplina  de id, Disciplina ($disciplina->nome) ");
            return redirect()->back()->with('Disciplina.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Disciplina.purge.error',1);
        }
    }
}

