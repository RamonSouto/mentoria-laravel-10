<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCliente;
use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request)
    {
        $pequisar = $request->pesquisar;
        $findClientes = $this->cliente->getClientePesquisarIndex(search: $pequisar ?? '');
        return view('Pages.clientes.paginacao', compact('findClientes'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $subRegistro = Cliente::find($id);
        $subRegistro->delete();
        Toastr::success('Cliente excluido com sucesso');
        return response()->json(['success'=> true], 200);
    }

    public function cadastrarCliente(FormRequestCliente $request){
        if($request->method()==="POST"){
            $data = $request->all();
            Cliente::create($data);
            Toastr::success('Cliente cadastrado com sucesso');
            return redirect()->route('clientes.index');
        }

        return view('Pages.clientes.create');
    }


    public function atualizarCliente(FormRequestCliente $request, $id){
        if($request->method()==="PUT"){

            $data = $request->all();
            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Cliente alterado com sucesso');
            return redirect()->route('clientes.index');
        }

        $findCliente = Cliente::where('id', '=', $id)->first();

        return view('Pages.clientes.atualiza',compact('findCliente'));
    }
}
