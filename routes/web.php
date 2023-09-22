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

Route::get('/', function () {
    return view('admin.index');
});
Route::get('/index', function () {
    return view('admin.index');
});
Route::get('/create', function () {
    return view('admin.user.create.index');
});
Route::get('/user', function () {
    return view('admin.user.index');
});
Route::get('/edit', function () {
    return view('admin.user.edit.index');
});



