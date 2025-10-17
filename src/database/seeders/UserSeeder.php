<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            "name" => 'Usuário ADM',
            "email" => 'admin@mail.com',
            "password" => bcrypt('admin123')
        ]);

        $user->permissions()->attach(1);
        
        $user = User::create([
            "name" => 'Thayanne Tenório',
            "email" => 'thay@mail.com',
            "password" => bcrypt('teste123')
        ]);
        
        $user = User::create([
            "name" => 'Eduarda França',
            "email" => 'duda@mail.com',
            "password" => bcrypt('senha123')
        ]);

        $user->permissions()->attach(2);
    }
}
