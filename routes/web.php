<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VendasController;
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


Route::prefix('dashboard')->group(function(){
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard.index');
});


Route::prefix('produtos')->group(function(){
    Route::get('/',[ProdutosController::class, 'index'])->name('produtos.index');
    //Cadastro
    Route::get('/cadastrarProduto',[ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto',[ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    //Atualizar UPDATE
    Route::get('/atualizarProduto/{id}',[ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}',[ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    
    Route::delete('/delete',[ProdutosController::class, 'delete'])->name('produto.delete');
});

Route::prefix('clientes')->group(function(){
    Route::get('/',[ClientesController::class, 'index'])->name('clientes.index');
    //Cadastro
    Route::get('/cadastrarCliente',[ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente',[ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    //Atualizar UPDATE
    Route::get('/atualizarCliente/{id}',[ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}',[ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    
    Route::delete('/delete',[ClientesController::class, 'delete'])->name('cliente.delete');
});


Route::prefix('vendas')->group(function(){
    Route::get('/',[VendasController::class, 'index'])->name('vendas.index');
    //Cadastro
    Route::get('/cadastrarVenda',[VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarVenda',[VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::get('/enviaComprovantePorEmail/{id}',[VendasController::class, 'enviaComprovantePorEmail'])->name('enviaComprovantePorEmail.venda');
    //Atualizar UPDATE
    // Route::get('/atualizarVenda/{id}',[VendasController::class, 'atualizarVenda'])->name('atualizar.vendas');
    // Route::put('/atualizarVenda/{id}',[VendasController::class, 'atualizarVenda'])->name('atualizar.vendas');
    
    // Route::delete('/delete',[VendasController::class, 'delete'])->name('venda.delete');
});

Route::prefix('usuario')->group(function(){
    Route::get('/',[UsuarioController::class, 'index'])->name('usuario.index');
});
