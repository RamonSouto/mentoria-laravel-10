<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalDeProdutoCadastrado = $this->buscaTotalProdutoCadastrado();
        $totalDeClienteCadastrado = $this->buscaTotalClienteCadastrado();
        $totalDeVendaCadastrado = $this->buscaTotalVendaCadastrado();
        $totalDeUsuarioCadastrado = $this->buscaTotalUsuarioCadastrado();

        return view('Pages.dashboard.dashboard', compact('totalDeProdutoCadastrado','totalDeClienteCadastrado','totalDeVendaCadastrado','totalDeUsuarioCadastrado'));
    }

    public function buscaTotalProdutoCadastrado(): int {
        return Produto::all()->count();
    }

    public function buscaTotalClienteCadastrado(): int {
        return Cliente::all()->count();
    }

    public function buscaTotalVendaCadastrado(): int {
        return Venda::all()->count();
    }

    public function buscaTotalUsuarioCadastrado(): int {
        return User::all()->count();
    }
}
