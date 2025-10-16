<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
                    [
                        'name' => 'Thayanne Tenório',
                        'email' => 'admin@mail.com',
                        'password' => bcrypt('admin123'),
                    ],
                    [
                        'name' => 'João Silva',
                        'email' => 'joao@mail.com',
                        'password' => bcrypt('password123'),
                    ],
                    [
                        'name' => 'Maria Eduarda',
                        'email' => 'maria@mail.com',
                        'password' => bcrypt('mudar123'),
                    ],
                    [
                        'name' => 'Carlos Alberto',
                        'email' => 'carlos@mail.com',
                        'password' => bcrypt('segredo123'),
                    ],
                    [
                        'name' => 'Ana Beatriz',
                        'email' => 'ana@mail.com',
                        'password' => bcrypt('minhaSenha123'),
                    ],
                    [
                        'name' => 'Pedro Henrique',
                        'email' => 'pedro@mail.com',
                        'password' => bcrypt('senhaForte123'),
                    ],
                    [
                        'name' => 'Juliana Costa',
                        'email' => 'juliana@mail.com',
                        'password' => bcrypt('protegido123'),
                    ],
                    [
                        'name' => 'Lucas Fernandes',
                        'email' => 'lucas@mail.com',
                        'password' => bcrypt('meuPassword123'),
                    ],
                    [
                        'name' => 'Mariana Oliveira',
                        'email' => 'mariana@mail.com',
                        'password' => bcrypt('senhaSegura123'),
                    ],
                    [
                        'name' => 'Rafael Gomes',
                        'email' => 'rafael@mail.com',
                        'password' => bcrypt('acesso123'),
                    ],
                    [
                        'name' => 'Darth Vader',
                        'email' => 'maytheforce@mail.com',
                        'password' => bcrypt('senha12345'),
                    ],
            ];
        User::insert($users);
    }
}
