<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Desenvolvido por Mateus Dias 07-02-22 para fins de estudo
| 
| 
|
*/
// chamando function principal do PrincipalController
Route::get('/', [\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');


// chamando function sobreNos do SobreNosController
Route::get('/sobre-nos',[App\Http\Controllers\SobreNosController::class,'sobreNos'])->name('site.sobrenos');

// chamando function contato do ContatoController
Route::get('/contato', [App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');
Route::get('/login', function(){return 'login';})->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', [App\Http\Controllers\FornecedorController::class,'index'])->name('app.fornecedores');
    Route::get('/produtos', function(){return 'produtos';})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', [App\Http\Controllers\TesteController::class,'teste'])->name('teste');

// Route::get('/rota1', function(){
//     return 'rota1';
// })->name('site.rota1');

// // Formas de redirecionar rotas
// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

//Route::redirect('/rota2','/rota1');

// caso de o usuario acessar uma pagina inexistente
Route::fallback(function(){
    echo "rota inexistente <a href='" .  route('site.index') . "'>clique aqui</a> para retornar ";
});