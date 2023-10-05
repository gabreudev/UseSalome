<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use GuzzleHttp\Psr7\Request;

class AdminController extends Controller
{
    function listaProdutos(){
        $produtos =  Produto::paginate(5);
        return view('admin.produtos', compact('produtos'));
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
    function store(Request $request){
        $data = $request;
        $data['role']= 'ROLE_USER';
        Produto::create($data);

        return redirect(route('listaProd'));
    }

}