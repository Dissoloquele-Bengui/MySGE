@extends('layout.admin.body')
@section('titulo','Actualizar Classe')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Classe</strong>
        </div>
        <form action="{{route('admin.classe.update',$classe->id)}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.classeForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
