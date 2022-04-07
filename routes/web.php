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
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])
    ->name('site.index');

// chamando function sobreNos do SobreNosController
Route::get('/sobre-nos', [App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

// chamando function contato do ContatoController
Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login{erro?}', [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'autenticacao'])->name('site.login');

Route::prefix('/app')->middleware('autenticacao:padrao,visitante')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');

    Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');

    Route::get('/fornecedor/editar/{id}/{msg?}', [App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [App\Http\Controllers\FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

    Route::resource('produto', 'App\Http\Controllers\ProdutoController');


    Route::resource('produto-detalhe', 'App\Http\Controllers\ProdutoDetalheController');


    Route::resource('cliente', 'App\Http\Controllers\ClienteController');
    Route::resource('pedido', 'App\Http\Controllers\PedidoController');
    // Route::resource('pedido-produto', 'App\Http\Controllers\PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', [App\Http\Controllers\PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', [App\Http\Controllers\PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
});

Route::get('/teste/{p1}/{p2}', [App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

// Route::get('/rota1', function(){
//     return 'rota1';
// })->name('site.rota1');

// // Formas de redirecionar rotas
// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

//Route::redirect('/rota2','/rota1');

// caso de o usuario acessar uma pagina inexistente
Route::fallback(function () {
    echo "rota inexistente <a href='" .  route('site.index') . "'>clique aqui</a> para retornar ";
});
