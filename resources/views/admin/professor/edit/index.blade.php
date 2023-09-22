@extends('layout.admin.body')
@section('titulo','Actualizar Professor')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Professor</strong>
        </div>
        <form action="{{route('admin.professor.update',$professor->id)}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.professorForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
