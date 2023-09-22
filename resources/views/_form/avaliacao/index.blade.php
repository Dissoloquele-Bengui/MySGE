<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="idTurma">Turma</label>
            <select name="idTurma" class="form-control" id="">
                @foreach ($turmas as $turma)
                    <option value="{{$turma->id}}" @if (isset($turma)){{ $turma->idTurma==$turma->id ?'selected':'' }}  @endif> {{$turma->nome}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="idTrimeste">Trimestre</label>
            <select name="idTrimeste" class="form-control" id="">
                @foreach ($trimestres as $trimestre )
                    <option value="{{$trimestre->id}}" >{{ $trimestre->nome }}</option>
                @endforeach
            </select>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="idDisciplina">Disciplina</label>
            <select name="idDisciplina" class="form-control" id="">
                @foreach ($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}" @if (isset($turma)){{ $turma->idDisciplina==$disciplina->id ?'selected':'' }}  @endif> {{$disciplina->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
