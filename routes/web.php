<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
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

Route::resource('produtos', ProdutoController::class);
Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home',[ProdutoController::class, 'index'])->name('index');
Route::get('/produto/{slug}',[ProdutoController::class, 'details'])->name('details');
Route::get('/categoria/{id}', [ProdutoController::class, 'categoria'])->name('categoria');

Route::post('/addcarrinho/{id}', [CarrinhoController::class, 'addcarrinho'])->name('addcarrinho');
Route::get('/carrinho', [CarrinhoController::class, 'carrinho'])->name('carrinho');
Route::delete('/rmvcarrinho/{id}', [CarrinhoController::class, 'rmvcarrinho'])->name('rmvcarrinho');
Route::get('/limparcarrinho', [CarrinhoController::class, 'limparcarrinho'])->name('limparcarrinho');
Route::post('/atualizacarrinho', [CarrinhoController::class, 'atualizacarrinho'])->name('atualizacarrinho');

Route::view('/sobre', 'site.sobre')->name('sobre');

Route::view('/login', 'login.form')->name('form');
Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [LoginController::class, 'create'])->name('create');
Route::post('/store', [UserController::class, 'store'])->name('store');

Route::get('/listaProdutos', [AdminController::class, 'listaProdutos'])->name('listaProdutos');
Route::get('/listaVendas', [AdminController::class, 'listaVendas'])->name('listaVendas');
//Route::get('/cadastroProd', [AdminController::class, 'cadastroProd'])->name('cadastroProd');

Route::view('/listaProd', 'admin.cadastroProd')->name('cadastroProd');

Route::get('/deleteProd/{id}', [AdminController::class, 'deleteProd'])->name('deleteProd');

Route::get('/semEstoque}', [AdminController::class, 'listaSemEstoque'])->name('semEstoque');

Route::post('/cadastrarProd', [AdminController::class, 'store'])->name('cadastrarProd');