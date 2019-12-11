<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/visado', function () {
    return view('visado');
})->middleware('auth');

Route::get('/registro', function () {
    return view('registro');
})->middleware('auth');

Route::get('/administracion', function(){
    return view('administracion');
})->middleware('auth');

Auth::routes();

Route::resource('api/visado', 'VisadoController')->middleware('auth');
Route::resource('api/registro', 'RegistroController')->middleware('auth');
Route::resource('api/administracion', 'AdministracionController')->middleware('auth');
Route::resource('api/administracion/ajustes', 'AjustesController')->middleware('auth');
Route::resource('api/recaptcha', 'RecaptchaController');
