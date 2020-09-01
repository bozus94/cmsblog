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

        $postsAdmin = [
            Permission::create([
                'name' => 'posts.index',
                'description' => 'Permite listar las entradas del sistema'
            ]),
            Permission::create([
                'name' => 'posts.create',
                'description' => 'Permite crear nuevas entradas'
            ]),
            Permission::create([
                'name' => 'posts.edit',
                'description' => 'Permite editar las entradas del sistema'
            ]),
            Permission::create([
                'name' => 'posts.show',
                'description' => 'Permite visualizar en detalle las entradas del sistema'
            ]),
            Permission::create([
                'name' => 'posts.destroy',
                'description' => 'Permite eliminar las entradas del sistema'
            ]),
        ];

        $rolesAdmin = [
            Permission::create([
                'name' => 'roles.index',
                'description' => 'Permite listar los roles del sistema'
            ]),
            Permission::create([
                'name' => 'roles.create',
                'description' => 'Permite crear nuevos role'
            ]),
            Permission::create([
                'name' => 'roles.edit',
                'description' => 'Permite editar los roles del sistema'
            ]),
            Permission::create([
                'name' => 'roles.show',
                'description' => 'Permite visualizar en detalle los roles del sistema'
            ]),
            Permission::create([
                'name' => 'roles.destroy',
                'description' => 'Permite eliminar los roles del sistema'
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

        $categoriesAdmin = [
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

        $roleAdmin = Role::Create([
            'name' => 'Administrador',
            'description' => 'Gestiona todo el sistema '
        ]);

        $roleTag = Role::Create([
            'name' => 'Administrador de etiquetas',
            'description' => 'Gestiona las etiquetas del sistema'
        ]);
        $roleTag->givePermissionTo($tagsAdmin);

        $roleUser = Role::Create([
            'name' => 'Administrador de usuarios',
            'description' => 'Gestiona los usuarios del sistema'
        ]);
        $roleUser->givePermissionTo($usersAdmin);

        $rolePost = Role::Create([
            'name' => 'Administrador de posts',
            'description' => 'Gestiona los posts del sistema'
        ]);
        $rolePost->givePermissionTo($postsAdmin);

        $roleRole = Role::Create([
            'name' => 'Administrador de roles',
            'description' => 'Gestiona los roles del sistema'
        ]);
        $roleRole->givePermissionTo($rolesAdmin);

        $roleCat = Role::Create([
            'name' => 'Administrador de categorias',
            'description' => 'Gestiona las categorias del sistema'
        ]);
        $roleCat->givePermissionTo($categoriesAdmin);

        $user = User::create([
            'name' => 'Bryan Ortega',
            'email' => 'bortega@admin.com',
            'password' => bcrypt('admin12340'),
        ]);
        $user->assignRole($roleAdmin);
    }
}
