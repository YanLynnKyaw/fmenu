<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::UpdateOrCreate(
            [
                'name' => 'admin',
            ],
            [
                'name' => 'admin'
            ]
        );
        $role_editor = Role::UpdateOrCreate(
            [
                'name' => 'editor',
            ],
            [
                'name' => 'editor'
            ]
        );

        $role_guest = Role::UpdateOrCreate(
            [
                'name' => 'guest',
            ],
            [
                'name' => 'guest'
            ]
        );

        $permission = Permission::UpdateOrCreate(
            [
                'name' => 'ed_de',
            ],
            [
                'name' => 'ed_de'
            ]
        );
        $permission2 = Permission::UpdateOrCreate(
            [
                'name' => 'view_only',
            ],
            [
                'name' => 'view_only'
            ]
        );
        $permission3 = Permission::UpdateOrCreate(
            [
                'name' => 'view_only_forguest',
            ],
            [
                'name' => 'view_only_forguest'
            ]
        );

        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_editor->givePermissionTo($permission2);
        $role_guest->givePermissionTo($permission3);

        $user = User::find(1);
        $user2 = User::find(4);
        $user3 = User::find(5);
        
        $user->assignRole('admin');
        $user2->assignRole('editor');
        $user3->assignRole('guest');
    }
}