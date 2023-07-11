<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUsuario;
use App\Models\Componentes;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request){
        $pesquisar = $request->pesquisar;
        $findUsuarios = $this->user->getUserPesquisarIndex(search: $pesquisar ?? '');
        return view('Pages.usuario.paginacao', compact('findUsuarios'));
    }

    public function delete(Request $request){
        if(User::all()->count() <= 1){
            Toastr::error('Não foi possível excluir Usuário');
            return response()->json(['success'=> true], 200);
        }

        $id = $request->id;
        $subRegistro = User::find($id);
        $subRegistro->delete();
        Toastr::success('Usuário excluido com sucesso');
        return response()->json(['success'=> true], 200);
        
    }

    public function cadastrarUsuario(FormRequestUsuario $request){
        if($request->method()==="POST"){
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            Toastr::success('Usuário cadastrado com sucesso');
            return redirect()->route('usuario.index');
        }

        return view('Pages.usuario.create');
    }

    public function atualizarUsuario(FormRequestUsuario $request, $id){
        
        if($request->method()=="PUT"){
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $buscaRegistro = User::find($id);
            $buscaRegistro->update($data);
            Toastr::success('Usuário alterado com sucesso');
            return redirect()->route('usuario.index');
        }

        $findUsuario = User::where('id', '=', $id)->first();

        return view('Pages.usuario.atualiza',compact('findUsuario'));
    }
}
