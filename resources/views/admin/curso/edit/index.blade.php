@extends('layout.admin.body')
@section('titulo','Actualizar Curso')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Curso</strong>
        </div>
        <form action="{{route('admin.curso.update',$curso->id)}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.cursoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
