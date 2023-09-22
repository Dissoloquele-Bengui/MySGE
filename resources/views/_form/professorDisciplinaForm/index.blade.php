<div class="row">
    <div class="col-md-6">

        <div class="form-group mb-3">
            <label for="professor_id">Professor</label>
            <select name="professor_id" class="form-control" id="">
                @if (isset($professores))
                    <option value="{{$professores->id}}" > {{$professores->nome}} </option>
                @endif
                @if (isset($professorDisciplina))
                    <option value="{{$professorDisciplina->professor_id}}" > {{$professorDisciplina->professor}} </option>
                @endif
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="disciplina_id">Disciplina</label>
            <select name="disciplina_id" class="form-control" id="">
                @foreach ($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}" @if (isset($professorDisciplina)){{ $professorDisciplina->disciplina_id==$disciplina->id ?'selected':'' }}  @endif> {{$disciplina->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>


</div>

