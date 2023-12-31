<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            ProdutoSeeder::class,
            ClienteSeeder::class,
            VendaSeeder::class,
            UsuarioSeeder::class
        ]);
    }
}
