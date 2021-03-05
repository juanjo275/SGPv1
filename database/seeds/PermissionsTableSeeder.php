<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'banco_create',
            ],
            [
                'id'    => 18,
                'title' => 'banco_edit',
            ],
            [
                'id'    => 19,
                'title' => 'banco_show',
            ],
            [
                'id'    => 20,
                'title' => 'banco_delete',
            ],
            [
                'id'    => 21,
                'title' => 'banco_access',
            ],
            [
                'id'    => 22,
                'title' => 'configuracion_access',
            ],
            [
                'id'    => 23,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 24,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 25,
                'title' => 'tipo_cuenta_bancarium_create',
            ],
            [
                'id'    => 26,
                'title' => 'tipo_cuenta_bancarium_edit',
            ],
            [
                'id'    => 27,
                'title' => 'tipo_cuenta_bancarium_show',
            ],
            [
                'id'    => 28,
                'title' => 'tipo_cuenta_bancarium_delete',
            ],
            [
                'id'    => 29,
                'title' => 'tipo_cuenta_bancarium_access',
            ],
            [
                'id'    => 30,
                'title' => 'cuenta_bancarium_create',
            ],
            [
                'id'    => 31,
                'title' => 'cuenta_bancarium_edit',
            ],
            [
                'id'    => 32,
                'title' => 'cuenta_bancarium_show',
            ],
            [
                'id'    => 33,
                'title' => 'cuenta_bancarium_delete',
            ],
            [
                'id'    => 34,
                'title' => 'cuenta_bancarium_access',
            ],
            [
                'id'    => 35,
                'title' => 'estado_documento_comercial_create',
            ],
            [
                'id'    => 36,
                'title' => 'estado_documento_comercial_edit',
            ],
            [
                'id'    => 37,
                'title' => 'estado_documento_comercial_show',
            ],
            [
                'id'    => 38,
                'title' => 'estado_documento_comercial_delete',
            ],
            [
                'id'    => 39,
                'title' => 'estado_documento_comercial_access',
            ],
            [
                'id'    => 40,
                'title' => 'tipo_documento_comercial_create',
            ],
            [
                'id'    => 41,
                'title' => 'tipo_documento_comercial_edit',
            ],
            [
                'id'    => 42,
                'title' => 'tipo_documento_comercial_show',
            ],
            [
                'id'    => 43,
                'title' => 'tipo_documento_comercial_delete',
            ],
            [
                'id'    => 44,
                'title' => 'tipo_documento_comercial_access',
            ],
            [
                'id'    => 45,
                'title' => 'proveedore_create',
            ],
            [
                'id'    => 46,
                'title' => 'proveedore_edit',
            ],
            [
                'id'    => 47,
                'title' => 'proveedore_show',
            ],
            [
                'id'    => 48,
                'title' => 'proveedore_delete',
            ],
            [
                'id'    => 49,
                'title' => 'proveedore_access',
            ],
            [
                'id'    => 50,
                'title' => 'documento_comercial_create',
            ],
            [
                'id'    => 51,
                'title' => 'documento_comercial_edit',
            ],
            [
                'id'    => 52,
                'title' => 'documento_comercial_show',
            ],
            [
                'id'    => 53,
                'title' => 'documento_comercial_delete',
            ],
            [
                'id'    => 54,
                'title' => 'documento_comercial_access',
            ],
            [
                'id'    => 55,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
