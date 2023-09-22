@extends('layout.admin.body')
@section('titulo','Cadastrar Disciplina')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Disciplina</strong>
        </div>
        <form action="{{route('admin.disciplina.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.disciplinaForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
