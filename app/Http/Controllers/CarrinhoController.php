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
    
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $carrinho = session()->get('carrinho');
            $carrinho[$request->id]["quantidade"] = $request->quantity;
            session()->put('carrinho', $carrinho);
            return redirect()->back()->with('success', 'preco atualizado!');
        }
    }
  
    public function rmvcarrinho($id){
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
        
        $keys = array_keys(session('carrinho'));

        foreach ($keys as $key) {
        session()->forget('carrinho.' . $key);
        }
        return redirect()->back()->with('success', 'O seu carrinho foi limpo!');
    }
    public function atualizacarrinho(Request $request){

        $carrinho = session()->get('carrinho', []);
    
        if (isset($carrinho[$request->id])) {
            $carrinho[$request->id]['quantidade'] = $request->input('quantidade'); 
            
        } 
    
        session()->put('carrinho', $carrinho);
    
        return redirect()->back()->with('success', 'Preço atualizado com sucesso');
    }
    
    }   