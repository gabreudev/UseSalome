<?php

use App\Http\Controllers\ProdutoController;
use App\Models\Produto;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home',[ProdutoController::class, 'index'])->name('index');


Route::get('/produto/{slug}',[ProdutoController::class, 'details'])->name('details');

Route::get('/sobre', function(){
    return view('site.sobre');
});


