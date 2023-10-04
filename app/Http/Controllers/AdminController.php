<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class AdminController extends Controller
{
    function listaProdutos(){
        $produtos =  Produto::paginate(5);
        return view('admin.produtos', compact('produtos'));
    }

    function listaVendas(){
        // $vendas =  Venda::paginate(3);
         return view('admin.venda');
    }
    function cadastroProd(){
        return view('admin.cadastroProd');
    }
    
    function deleteProd($id){
        $produto = Produto::find($id);
    
        if ($produto) {
            $produto->delete();
            return view('admin.cadastroProd');//redirect()->back();
        } else {
            // Tratar o caso em que o produto não foi encontrado.
        }
    }

    
    function listaSemEstoque(){
        $produtos = Produto::where('quantidade', '=', 0)->paginate(3);
        return view('admin.produtos', compact('produtos'));
    }
}