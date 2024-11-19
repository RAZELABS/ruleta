<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        $permisos = [
            'edit',
            'delete',
            'create',
            'show',
            'update',

        ];

        foreach ($permisos as $permiso) {
            if (Permission::where('name', $permiso)->doesntExist()) {
                Permission::create(['name' => $permiso]);
            }
        }

        // Crear roles y asignar permisos
        $rolesPermisos = [
            'admin' => Permission::all(),
            'user_web' => Permission::all(),
            'eeditor' => Permission::all(),
            'diseñador' => Permission::all(),
        ];

        foreach ($rolesPermisos as $rol => $permisos) {
            if (Role::where('name', $rol)->doesntExist()) {
                $role = Role::create(['name' => $rol]);
                $role->givePermissionTo($permisos);
            } else {
                $role = Role::where('name', $rol)->first();
                $role->syncPermissions($permisos);
            }
        }
    }
}
