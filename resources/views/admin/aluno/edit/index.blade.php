@extends('layout.admin.body')
@section('titulo','Actualizar Aluno')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Aluno</strong>
        </div>
        <form action="{{route('admin.aluno.update',$aluno->id)}}" method="post" enctype="multipart/data">
            @csrf
            <div class="card-body">
                @include('_form.alunoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
