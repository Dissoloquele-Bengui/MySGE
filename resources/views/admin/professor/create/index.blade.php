@extends('layout.admin.body')
@section('titulo','Cadastrar Professor')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Professor</strong>
        </div>
        <form action="{{route('admin.professor.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.professorForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
