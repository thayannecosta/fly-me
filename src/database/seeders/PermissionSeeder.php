<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = Permission::insert([
            // permissões de usuário
            [
                'name' => 'god',
                'description' => 'Administrador',
            ],
            [
                'name' => 'user_store',
                'description' => 'Criar usuários',
            ],
            [
                'name' => 'user_view',
                'description' => 'Visualizar usuários',
            ],
            [
                'name' => 'user_update',
                'description' => 'Alterar usuários',
            ],
            [
                'name' => 'user_delete',
                'description' => 'Excluir usuários',
            ],
            // permissões de solicitação de viagem
            [
                'name' => 'trip_solicitation',
                'description' => 'Solicitar viagens',
            ],
            [
                'name' => 'trip_update',
                'description' => 'Alterar viagem',
            ],
            [
                'name' => 'trip_view',
                'description' => 'Visualizar solicitação de viagens',
            ],
            [
                'name' => 'trip_delete',
                'description' => 'Excluir solicitação de viagens',
            ],
            [
                'name' => 'trip_status_update',
                'description' => 'Alterar status da solicitação de viagens',
            ],
            
            
        ]);
    }
}
