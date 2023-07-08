<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{

    public function run(): void
    {
        Cliente::create([
            'nome' => 'Ramon Souto',
            'email' => 'rdssi@hotmail.com',
            'endereco' => 'rua x',
            'logradouro' => 'teste',
            'cep' => '74343020',
            'bairro' => 'Jardim Vitoria'
        ]);
        Cliente::create([
            'nome' => '123',
            'email' => '123@hotmail.com',
            'endereco' => 'rua x',
            'logradouro' => 'teste',
            'cep' => '74343020',
            'bairro' => 'Jardim Vitoria'
        ]);
        Cliente::create([
            'nome' => 'ABC',
            'email' => 'abc@hotmail.com',
            'endereco' => 'rua x',
            'logradouro' => 'teste',
            'cep' => '74343020',
            'bairro' => 'Jardim Vitoria'
        ]);
    }
}
