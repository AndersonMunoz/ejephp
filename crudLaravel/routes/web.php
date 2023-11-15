<?php

use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\ActualizarController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/listar', function () {
    return view('listar');
});

Route::get('/registrar', function () {
    return view('registrar');
});

Route::get('/registrar',[RegistrarController::class,'index'])->name('registrar');
Route::post('/registrar',[RegistrarController::class,'store']);

Route::get('/listar',[UserController::class,'listar'])->name('listar');

Route::get('/actualizar/{id}',[UserController::class,'actualizar'])->name('actualizar');
Route::put('/editar/{id}',[UserController::class,'editar'])->name('editar');

Route::delete('/eliminar/{id}',[UserController::class,'eliminar'])->name('eliminar');

Route::get('/descargar/{id}',[UserController::class,'descargarPDF'])->name('descargar.pdf');

