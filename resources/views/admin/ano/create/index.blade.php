@extends('layout.admin.body')
@section('titulo','Cadastrar Ano Lectivo')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Ano Lectivo</strong>
        </div>
        <form action="{{route('admin.ano.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.anoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
