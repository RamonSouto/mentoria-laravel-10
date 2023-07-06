<?php

namespace App\Http\Controllers;

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
        
    }
}
