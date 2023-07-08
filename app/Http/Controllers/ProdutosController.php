<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
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
        Toastr::success('Produto excluido com sucesso');
        return response()->json(['success'=> true], 200);
    }

    public function cadastrarProduto(FormRequestProduto $request){
        if($request->method()==="POST"){
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatarMascaraDinheiroDecimal($data['valor']);
            Produto::create($data);
            Toastr::success('Produto cadastrado com sucesso');
            return redirect()->route('produtos.index');
        }

        return view('Pages.produtos.create');
    }


    public function atualizarProduto(FormRequestProduto $request, $id){
        if($request->method()==="PUT"){

            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatarMascaraDinheiroDecimal($data['valor']);
            $buscaRegistro = Produto::find($id);
            $buscaRegistro->update($data);
            Toastr::success('Produto alterado com sucesso');
            return redirect()->route('produtos.index');
        }

        $findProduto = Produto::where('id', '=', $id)->first();

        return view('Pages.produtos.atualiza',compact('findProduto'));
    }
}
