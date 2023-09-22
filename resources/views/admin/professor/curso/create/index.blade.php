@extends('layout.admin.body')
@section('titulo','Atribuir Disciplina')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Atribuir Disciplina</strong>
        </div>
        <form action="{{route('admin.professor.storeVinculoDisciplina',)}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.professorCursoForm.index')
                <button type="submit" class="btn btn-primary w-md">Atribuir</button>
            </div>
        </form>
    </div>
@endsection
