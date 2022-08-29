<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\FuncionarioController;

Route::get('/', [AcessoController::class, 'login']);
Route::get('/Login', [AcessoController::class, 'login']);
Route::get('/EsqueceuSenha', [AcessoController::class, 'forgot']);
Route::post('/EsqueceuSenha', [AcessoController::class, 'forgotPost']);
Route::post('/Verifica', [AcessoController::class, 'verifica'])->name('login');
Route::get('/Recuperar/{token}', [AcessoController::class, 'verificaToken']);
Route::post('/Recuperar/{token}', [AcessoController::class, 'novaSenha']);
Route::get('/Sair', [AcessoController::class, 'logout']);

Route::get('/Funcionarios', [FuncionarioController::class, 'lista']);
Route::get('/AdicionarFuncionario', [FuncionarioController::class, 'add']);
Route::post('/todosFuncionarios', [FuncionarioController::class, 'todosFuncionarios'])->name('todosFuncionarios');

