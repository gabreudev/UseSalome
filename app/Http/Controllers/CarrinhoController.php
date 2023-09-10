<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    public function addCarrinho($id)
{
    $produto = Produto::findOrFail($id);

    $carrinho = session()->get('carrinho', []);

    if (isset($carrinho[$id])) {
        $carrinho[$id]['quantidade']++;
        $mensagem = 'acrescentado mais uma unidade deste item ao carrinho';
    } else {
        $carrinho[$id] = [
            'id' => $produto->id,
            'nome' => $produto->nome,
            'descricao' => $produto->descricao,
            'preco' => $produto->preco,
            'image' => $produto->image,
            'quantidade' => 1,
            'estoque' => $produto->quantidade
        ];
        $mensagem = 'Produto adicionado ao Carrinho com sucesso';
    }

    session()->put('carrinho', $carrinho);

    return redirect()->back()->with('success', $mensagem);
}

    public function carrinho(){
        return view('site.carrinho');
    }
    
    public function atualizacarrinho(Request $request)
    {
        if($request->id && $request->quantity){
            $carrinho = session()->get('carrinho');
            $carrinho[$request->id]["quantity"] = $request->quantity;
            session()->put('carrinho', $carrinho);
            session()->flash('success', 'preço do item atualizado atualizado!');
        }
    }
  
    public function rmvcarrinho($id)
    {
        if($id) {
            $carrinho = session()->get('carrinho');
            if(isset($carrinho[$id])) {
                unset($carrinho[$id]);
                session()->put('carrinho', $carrinho);
            }
            return redirect()->back()->with('success', 'item removido com sucesso!');
        }
    }
    public function limparcarrinho() {
        session()->forget('carrinho');
        return redirect()->back()->with('success', 'O seu carrinho foi limpo!');
    }
    
}