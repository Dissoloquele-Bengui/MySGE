@extends('layout.admin.body')
@section('titulo','Actualizar Atribuição')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Atribuição</strong>
        </div>
        <form action="{{ route('admin.professor.updateVinculoDisciplina', ['id' => $professorDisciplina->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.professorCursoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
