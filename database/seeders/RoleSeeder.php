<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Client']);
        $role3 =Role::create(['name' => 'Agricultor']);

        Permission::create(['name'=> 'admin.index', 'description'=> 'Panel administrativo'])->syncRoles([$role1]);

        Permission::create(['name'=> 'admin.group', 'description'=> 'lista de administradores'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.group.create', 'description'=> 'crear uno administrador'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.group.destroy', 'description'=> 'eliminar administradores'])->syncRoles([$role1]);

        Permission::create(['name'=> 'admin.product', 'description'=> 'Lista de productos'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.product.create', 'description'=> 'Crear productos'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.product.edit', 'description'=> 'Modificar Producos'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.product.destroy', 'description'=> 'Eliminar productos'])->syncRoles([$role1]);

        Permission::create(['name'=> 'admin.taller', 'description'=> 'Lista de eventos'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.taller.create', 'description'=> 'Crear eventos'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.taller.edit', 'description'=> 'Modificar eventos'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.taller.destroy', 'description'=> 'Eliminar eventos'])->syncRoles([$role1]);
        
        Permission::create(['name'=> 'admin.planes', 'description'=> 'Lista de los planes'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.planes.create', 'description'=> 'Crear planes'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.planes.edit', 'description'=> 'Modificar planes'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.planes.destroy', 'description'=> 'Eliminar planes'])->syncRoles([$role1]);

        Permission::create(['name'=> 'admin.agricultores', 'description'=> 'lista de los agricultores'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.agricultor.createAgricultor', 'description'=> 'Crear agricultores'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.agricultores.edit', 'description'=> 'Modificar agricultores'])->syncRoles([$role1]);

        Permission::create(['name'=> 'admin.categories', 'description'=> 'Lista de categorias'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.categories.create', 'description'=> ' crear categorias'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.categories.destroy', 'description'=> 'Eliminar categorias'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.categories.edit', 'description'=> 'Modificar categorias'])->syncRoles([$role1]);

        Permission::create(['name'=> 'dashboard', 'description' => 'Panel inicial'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=> 'Turism', 'description' => 'Turismo'])->syncRoles([$role1, $role2, $role3]);
    }
}
