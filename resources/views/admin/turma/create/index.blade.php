@extends('layout.admin.body')
@section('titulo','Cadastrar Turma')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Turma</strong>
        </div>
        <form action="{{route('admin.turma.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.turmaForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
