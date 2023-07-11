<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{

    public function run(): void
    {
        User::create(
            [
                'name' => 'Ramon David Souto',
                'email' => 'rdssi@hotmail.com',
                'password' => Hash::make('ramon123')
            ]
        );
    }
}
