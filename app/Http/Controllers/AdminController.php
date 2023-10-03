<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class AdminController extends Controller
{
    function listaProdutos(){
        $produtos =  Produto::all()->paginate(5);
        return view('admin.produtos', compact('produtos'));
    }

    function listaVendas(){
        // $vendas =  Venda::paginate(3);
         return view('admin.venda');
    }
    function cadastroProd(){
        return view('admin.cadastroProd');
    }
}
