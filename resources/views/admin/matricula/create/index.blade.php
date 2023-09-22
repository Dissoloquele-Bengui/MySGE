@extends('layout.admin.body')
@section('titulo','Matricular')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Matricular</strong>
        </div>
        <form action="{{route('admin.matricula.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.matriculaForm.index')
                <button type="submit" class="btn btn-primary w-md">Matricular</button>
            </div>
        </form>
    </div>
@endsection
