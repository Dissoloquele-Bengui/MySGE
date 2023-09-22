<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('admin')->group(function(){
    Route::prefix('aluno')->group(function () {
        Route::get('index', ['as' => 'admin.aluno.index', 'uses' => 'App\Http\Controllers\AlunoController@index']);
        Route::get('create', ['as' => 'admin.aluno.create', 'uses' => 'App\Http\Controllers\AlunoController@create']);
        Route::post('store', ['as' => 'admin.aluno.store', 'uses' => 'App\Http\Controllers\AlunoController@store']);
        Route::get('edit/{id}', ['as' => 'admin.aluno.edit', 'uses' => 'App\Http\Controllers\AlunoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.aluno.update', 'uses' => 'App\Http\Controllers\AlunoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.aluno.destroy', 'uses' => 'App\Http\Controllers\AlunoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.aluno.purge', 'uses' => 'App\Http\Controllers\AlunoController@purge']);
    });
    Route::prefix('professor')->group(function () {
        Route::get('index', ['as' => 'admin.professor.index', 'uses' => 'App\Http\Controllers\ProfessorController@index']);
        Route::get('create', ['as' => 'admin.professor.create', 'uses' => 'App\Http\Controllers\ProfessorController@create']);
        Route::post('store', ['as' => 'admin.professor.store', 'uses' => 'App\Http\Controllers\ProfessorController@store']);
        Route::get('edit/{id}', ['as' => 'admin.professor.edit', 'uses' => 'App\Http\Controllers\ProfessorController@edit']);
        Route::post('update/{id}', ['as' => 'admin.professor.update', 'uses' => 'App\Http\Controllers\ProfessorController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.professor.destroy', 'uses' => 'App\Http\Controllers\ProfessorController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.professor.purge', 'uses' => 'App\Http\Controllers\ProfessorController@purge']);

        Route::get('listarVinculoDisciplina/{id}', ['as' => 'admin.professor.listarVinculoDisciplina', 'uses' => 'App\Http\Controllers\ProfessorController@listarVinculoDisciplina']);
        Route::get('createVinculoDisciplina/{id}', ['as' => 'admin.professor.createVinculoDisciplina', 'uses' => 'App\Http\Controllers\ProfessorController@createVinculoDisciplina']);
        Route::post('storeVinculoDisciplina', ['as' => 'admin.professor.storeVinculoDisciplina', 'uses' => 'App\Http\Controllers\ProfessorController@storeVinculoDisciplina']);
        Route::get('editVInculoDisciplina/{id}', ['as' => 'admin.professor.editVinculoDisciplina', 'uses' => 'App\Http\Controllers\ProfessorController@editVInculoDisciplina']);
        Route::post('updateVinculoDisciplina/{id}', ['as' => 'admin.professor.updateVinculoDisciplina', 'uses' => 'App\Http\Controllers\ProfessorController@updateVinculoDisciplina']);
        Route::get('destroyVinculoDisciplina/{id}', ['as' => 'admin.professor.destroyVinculoDisciplina', 'uses' => 'App\Http\Controllers\ProfessorController@destroyVinculoDisciplina']);
        Route::get('purgeVinculoDisciplina/{id}', ['as' => 'admin.professor.purgeVinculoDisciplina', 'uses' => 'App\Http\Controllers\ProfessorController@purgeVinculoDisciplina']);

        Route::get('listarVinculoTurma', ['as' => 'admin.professor.listarVinculoTurma', 'uses' => 'App\Http\Controllers\ProfessorController@listarVinculoTurma']);
        Route::get('createVinculoTurma', ['as' => 'admin.professor.createVinculoTurma', 'uses' => 'App\Http\Controllers\ProfessorController@createVinculoTurma']);
        Route::post('storeVinculoTurma', ['as' => 'admin.professor.storeVinculoTurma', 'uses' => 'App\Http\Controllers\ProfessorController@storeVinculoTurma']);
        Route::get('editVInculoTurma/{id}', ['as' => 'admin.professor.editVInculoTurma', 'uses' => 'App\Http\Controllers\ProfessorController@editVInculoTurma']);
        Route::post('updateVinculoTurma/{id}', ['as' => 'admin.professor.updateVinculoTurma', 'uses' => 'App\Http\Controllers\ProfessorController@updateVinculoTurma']);
        Route::get('destroyVinculoTurma/{id}', ['as' => 'admin.professor.destroyVinculoTurma', 'uses' => 'App\Http\Controllers\ProfessorController@destroyVinculoTurma']);
        Route::get('purgeVinculoTurma/{id}', ['as' => 'admin.professor.purgeVinculoTurma', 'uses' => 'App\Http\Controllers\ProfessorController@purgeVinculoTurma']);

        Route::get('listarVinculoCurso', ['as' => 'admin.professor.listarVinculoCurso', 'uses' => 'App\Http\Controllers\ProfessorController@listarVinculoCurso']);
        Route::get('createVinculoCurso', ['as' => 'admin.professor.createVinculoCurso', 'uses' => 'App\Http\Controllers\ProfessorController@createVinculoCurso']);
        Route::post('storeVinculoCurso', ['as' => 'admin.professor.storeVinculoCurso', 'uses' => 'App\Http\Controllers\ProfessorController@storeVinculoCurso']);
        Route::get('editVInculoCurso/{id}', ['as' => 'admin.professor.editVInculoCurso', 'uses' => 'App\Http\Controllers\ProfessorController@editVInculoCurso']);
        Route::post('updateVinculoCurso/{id}', ['as' => 'admin.professor.updateVinculoCurso', 'uses' => 'App\Http\Controllers\ProfessorController@updateVinculoCurso']);
        Route::get('destroyVinculoCurso/{id}', ['as' => 'admin.professor.destroyVinculoCurso', 'uses' => 'App\Http\Controllers\ProfessorController@destroyVinculoCurso']);
        Route::get('purgeVinculoCurso/{id}', ['as' => 'admin.professor.purgeVinculoCurso', 'uses' => 'App\Http\Controllers\ProfessorController@purgeVinculoCurso']);


    });

    Route::prefix('curso')->group(function () {
        Route::get('index', ['as' => 'admin.curso.index', 'uses' => 'App\Http\Controllers\CursoController@index']);
        Route::get('create', ['as' => 'admin.curso.create', 'uses' => 'App\Http\Controllers\CursoController@create']);
        Route::post('store', ['as' => 'admin.curso.store', 'uses' => 'App\Http\Controllers\CursoController@store']);
        Route::get('edit/{id}', ['as' => 'admin.curso.edit', 'uses' => 'App\Http\Controllers\CursoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.curso.update', 'uses' => 'App\Http\Controllers\CursoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.curso.destroy', 'uses' => 'App\Http\Controllers\CursoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.curso.purge', 'uses' => 'App\Http\Controllers\CursoController@purge']);
    });

    Route::prefix('classe')->group(function () {
        Route::get('index', ['as' => 'admin.classe.index', 'uses' => 'App\Http\Controllers\ClasseController@index']);
        Route::get('create', ['as' => 'admin.classe.create', 'uses' => 'App\Http\Controllers\ClasseController@create']);
        Route::post('store', ['as' => 'admin.classe.store', 'uses' => 'App\Http\Controllers\ClasseController@store']);
        Route::get('edit/{id}', ['as' => 'admin.classe.edit', 'uses' => 'App\Http\Controllers\ClasseController@edit']);
        Route::post('update/{id}', ['as' => 'admin.classe.update', 'uses' => 'App\Http\Controllers\ClasseController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.classe.destroy', 'uses' => 'App\Http\Controllers\ClasseController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.classe.purge', 'uses' => 'App\Http\Controllers\ClasseController@purge']);
    });
    Route::prefix('disciplina')->group(function () {
        Route::get('index', ['as' => 'admin.disciplina.index', 'uses' => 'App\Http\Controllers\DisciplinaController@index']);
        Route::get('create', ['as' => 'admin.disciplina.create', 'uses' => 'App\Http\Controllers\DisciplinaController@create']);
        Route::post('store', ['as' => 'admin.disciplina.store', 'uses' => 'App\Http\Controllers\DisciplinaController@store']);
        Route::get('edit/{id}', ['as' => 'admin.disciplina.edit', 'uses' => 'App\Http\Controllers\DisciplinaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.disciplina.update', 'uses' => 'App\Http\Controllers\DisciplinaController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.disciplina.destroy', 'uses' => 'App\Http\Controllers\DisciplinaController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.disciplina.purge', 'uses' => 'App\Http\Controllers\DisciplinaController@purge']);
    });
    Route::prefix('ano')->group(function () {
        Route::get('index', ['as' => 'admin.ano.index', 'uses' => 'App\Http\Controllers\AnoController@index']);
        Route::get('create', ['as' => 'admin.ano.create', 'uses' => 'App\Http\Controllers\AnoController@create']);
        Route::post('store', ['as' => 'admin.ano.store', 'uses' => 'App\Http\Controllers\AnoController@store']);
        Route::get('edit/{id}', ['as' => 'admin.ano.edit', 'uses' => 'App\Http\Controllers\AnoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.ano.update', 'uses' => 'App\Http\Controllers\AnoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.ano.destroy', 'uses' => 'App\Http\Controllers\AnoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.ano.purge', 'uses' => 'App\Http\Controllers\AnoController@purge']);
    });
    Route::prefix('turma')->group(function () {
        Route::get('index', ['as' => 'admin.turma.index', 'uses' => 'App\Http\Controllers\TurmaController@index']);
        Route::get('create', ['as' => 'admin.turma.create', 'uses' => 'App\Http\Controllers\TurmaController@create']);
        Route::post('store', ['as' => 'admin.turma.store', 'uses' => 'App\Http\Controllers\TurmaController@store']);
        Route::get('edit/{id}', ['as' => 'admin.turma.edit', 'uses' => 'App\Http\Controllers\TurmaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.turma.update', 'uses' => 'App\Http\Controllers\TurmaController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.turma.destroy', 'uses' => 'App\Http\Controllers\TurmaController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.turma.purge', 'uses' => 'App\Http\Controllers\TurmaController@purge']);
    });
    Route::prefix('matricula')->group(function () {
        Route::get('index', ['as' => 'admin.matricula.index', 'uses' => 'App\Http\Controllers\MatriculaController@index']);
        Route::get('create', ['as' => 'admin.matricula.create', 'uses' => 'App\Http\Controllers\MatriculaController@create']);
        Route::post('store', ['as' => 'admin.matricula.store', 'uses' => 'App\Http\Controllers\MatriculaController@store']);
        Route::get('edit/{id}', ['as' => 'admin.matricula.edit', 'uses' => 'App\Http\Controllers\MatriculaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.matricula.update', 'uses' => 'App\Http\Controllers\MatriculaController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.matricula.destroy', 'uses' => 'App\Http\Controllers\MatriculaController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.matricula.purge', 'uses' => 'App\Http\Controllers\MatriculaController@purge']);
    });
    Route::prefix('propina')->group(function () {
        Route::get('index', ['as' => 'admin.propina.index', 'uses' => 'App\Http\Controllers\PropinaController@index']);
        Route::get('create', ['as' => 'admin.propina.create', 'uses' => 'App\Http\Controllers\PropinaController@create']);
        Route::post('store', ['as' => 'admin.propina.store', 'uses' => 'App\Http\Controllers\PropinaController@store']);
        Route::post('pagarPropina', ['as' => 'admin.propina.pagarPropina', 'uses' => 'App\Http\Controllers\PropinaController@pagarPropina']);
        Route::get('pagar/{id}', ['as' => 'admin.propina.pagar', 'uses' => 'App\Http\Controllers\PropinaController@pagar']);
        Route::get('edit/{id}', ['as' => 'admin.propina.edit', 'uses' => 'App\Http\Controllers\PropinaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.propina.update', 'uses' => 'App\Http\Controllers\PropinaController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.propina.destroy', 'uses' => 'App\Http\Controllers\PropinaController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.propina.purge', 'uses' => 'App\Http\Controllers\PropinaController@purge']);
    });
    Route::prefix('avaliacao')->group(function () {
        Route::get('prova', ['as' => 'admin.avaliacao.prova', 'uses' => 'App\Http\Controllers\AvaliacaoController@prova']);
        Route::post('lancarProva', ['as' => 'admin.avaliacao.lancarProva', 'uses' => 'App\Http\Controllers\AvaliacaoController@lancarProva']);
        Route::get('lancarProva', ['as' => 'admin.avaliacao.lancarProva', 'uses' => 'App\Http\Controllers\AvaliacaoController@lancarProva']);
        Route::post('lancarAvaliacao', ['as' => 'admin.avaliacao.lancarAvaliacao', 'uses' => 'App\Http\Controllers\AvaliacaoController@lancarAvaliacao']);
        Route::post('registarAvaliacao', ['as' => 'admin.avaliacao.registarAvaliacao', 'uses' => 'App\Http\Controllers\AvaliacaoController@registarAvaliacao']);
        Route::get('avaliar', ['as' => 'admin.avaliacao.avaliar', 'uses' => 'App\Http\Controllers\AvaliacaoController@avaliar']);
        Route::post('registarProva/{disciplina_id}', ['as' => 'admin.avaliacao.registarProva', 'uses' => 'App\Http\Controllers\AvaliacaoController@registarProva']);
        Route::post('consultarNotaProva', ['as' => 'admin.avaliacao.consultarNotaProva', 'uses' => 'App\Http\Controllers\AvaliacaoController@consultarNotaProva']);

        Route::get('verProva', ['as' => 'admin.avaliacao.verProva', 'uses' => 'App\Http\Controllers\AvaliacaoController@verProva']);
    });
    Route::prefix('frequencia')->group(function () {
        Route::get('presenca', ['as' => 'admin.frequencia.presenca', 'uses' => 'App\Http\Controllers\FrequenciaController@registar']);
        Route::get('index', ['as' => 'admin.frequencia.index', 'uses' => 'App\Http\Controllers\FrequenciaController@index']);
        Route::post('lancarFrequencia', ['as' => 'admin.frequencia.lancarFrequencia', 'uses' => 'App\Http\Controllers\FrequenciaController@lancarFrequencia']);
        Route::post('verFrequencia', ['as' => 'admin.frequencia.verFrequencia', 'uses' => 'App\Http\Controllers\FrequenciaController@verFrequencia']);
        Route::post('registarFrequencia/{disciplina_id}/{data_atual}', ['as' => 'admin.frequencia.registarFrequencia', 'uses' => 'App\Http\Controllers\FrequenciaController@registarFrequencia']);
    });
    Route::prefix('falta')->group(function () {
        Route::get('justificar', ['as' => 'admin.falta.justificar', 'uses' => 'App\Http\Controllers\FaltaController@justificar']);
        Route::post('verTurmaFalta', ['as' => 'admin.falta.verTurmaFalta', 'uses' => 'App\Http\Controllers\FaltaController@verTurmaFalta']);
        Route::post('verAlunoFalta', ['as' => 'admin.falta.verAlunoFalta', 'uses' => 'App\Http\Controllers\FaltaController@verAlunoFalta']);
        Route::post('justificarFalta', ['as' => 'admin.falta.justificarFalta', 'uses' => 'App\Http\Controllers\FaltaController@justificarFalta']);
        Route::post('registarJustificativa', ['as' => 'admin.falta.registarJustificativa', 'uses' => 'App\Http\Controllers\FaltaController@registarJustificativa']);
    });
});
