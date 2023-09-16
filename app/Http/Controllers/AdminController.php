<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class AdminController extends Controller
{
    function listaProdutos(){
        $produtos =  Produto::paginate(3);
        return view('admin.produtos', compact('produtos'));
    }

    function listaVendas(){
        // $vendas =  Venda::paginate(3);
        // return view('admin.venda', compact('vendas'));
    }
}
