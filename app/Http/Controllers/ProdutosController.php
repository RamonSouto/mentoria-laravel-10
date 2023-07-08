<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    public function index(Request $request){
        $pesquisar = $request->pesquisar;
        $findProdutos = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');
        return view('Pages.produtos.paginacao', compact('findProdutos'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $subRegistro = Produto::find($id);
        $subRegistro->delete();

        return response()->json(['success'=> true], 200);
    }

    public function cadastrarProduto(FormRequestProduto $request){
        if($request->method()==="POST"){
            $data = $request->all();
            Produto::create($data);

            return redirect()->route('produtos.index');
        }

        return view('Pages.produtos.create');
    }
}
