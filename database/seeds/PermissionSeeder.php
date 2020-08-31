<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagsAdmin = [
            Permission::create([
                'name' => 'tags.index',
                'description' => 'Permite listar las etiquetas del sistema'
            ]),
            Permission::create([
                'name' => 'tags.create',
                'description' => 'Permite crear nuevas etiquetas'
            ]),
            Permission::create([
                'name' => 'tags.edit',
                'description' => 'Permite editar las etiquetas del sistema'
            ]),
            Permission::create([
                'name' => 'tags.show',
                'description' => 'Permite visualizar en detalle las etiquetas del sistema'
            ]),
            Permission::create([
                'name' => 'tags.destroy',
                'description' => 'Permite eliminar las etiquetas del sistema'
            ]),
        ];

        $usersAdmin = [
            Permission::create([
                'name' => 'users.index',
                'description' => 'Permite listar los usuarios del sistema'
            ]),
            Permission::create([
                'name' => 'users.edit',
                'description' => 'Permite editar los usuarios del sistema'
            ]),
            Permission::create([
                'name' => 'users.show',
                'description' => 'Permite visualizar en detalle los usuarios del sistema'
            ]),
            Permission::create([
                'name' => 'users.destroy',
                'description' => 'Permite eliminar los usuarios del sistema'
            ])
        ];

        $categoriasAdmin = [
            Permission::create([
                'name' => 'categories.index',
                'description' => 'Permite listar las categorias del sistema'
            ]),
            Permission::create([
                'name' => 'categories.create',
                'description' => 'Permite crear nuevas categorias'
            ]),
            Permission::create([
                'name' => 'categories.edit',
                'description' => 'Permite editar las categorias del sistema'
            ]),
            Permission::create([
                'name' => 'categories.show',
                'description' => 'Permite visualizar en detalle las categorias del sistema'
            ]),
            Permission::create([
                'name' => 'categories.destroy',
                'description' => 'Permite eliminar las categorias del sistema'
            ]),
        ];

        $role = Role::Create([
            'name' => 'Administrador Supremo',
            'description' => 'Gestiona todo el sistema '
        ]);
        $role->givePermissionTo($categoriasAdmin);

        $role = Role::Create([
            'name' => 'Administrador de etiquetas',
            'description' => 'Gestiona las etiquetas del sistema'
        ]);
        $role->givePermissionTo($tagsAdmin);

        $role = Role::Create([
            'name' => 'Administrador de usuarios',
            'description' => 'Gestiona los usuarios del sistema'
        ]);
        $role->givePermissionTo($usersAdmin);

        $role = Role::Create([
            'name' => 'Administrador de categorias',
            'description' => 'Gestiona las categorias del sistema'
        ]);

        $user = User::create([
            'name' => 'Bryan Ortega',
            'email' => 'bortega@admin.com',
            'password' => bcrypt('admin12340'),
        ]);
        $user->assignRole($role);
    }
}
