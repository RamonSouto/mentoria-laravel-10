<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Cliente;
use App\Models\Componentes;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VendasController extends Controller
{
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index(Request $request){
        $pesquisar = $request->pesquisar;
        $findVendas = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');
        return view('Pages.vendas.paginacao', compact('findVendas'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $subRegistro = Venda::find($id);
        $subRegistro->delete();
        Toastr::success('Produto excluido com sucesso');
        return response()->json(['success'=> true], 200);
    }

    public function cadastrarVenda(FormRequestVenda $request){
        $findNumeracao = Venda::max('numero_da_venda') + 1;
        $findProdutos = Produto::all();
        $findClientes = Cliente::all();

        if($request->method()=="POST"){
            $data = $request->all();
            $data['numero_da_venda'] = $findNumeracao;
            ds($data);
            Venda::create($data);
            Toastr::success('Venda cadastrado com sucesso');
            return redirect()->route('vendas.index');
        }
        return view('Pages.vendas.create', compact('findNumeracao','findProdutos','findClientes'));
    }

    public function enviaComprovantePorEmail($id) {
        $buscaVenda = Venda::where('id', '=', $id)->first();
        $produtoNome = $buscaVenda->produto->nome;
        $clienteEmail = $buscaVenda->cliente->email;
        $clienteNome = $buscaVenda->cliente->nome;
        $sendMailData = [
            'produtoNome' =>$produtoNome,
            'clienteNome' => $clienteNome,

        ];
        Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($sendMailData));

        Toastr::success('E-mail enviado com sucesso');
        return redirect()->route('vendas.index');
    }

}
