<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create([
            'name'          => 'superadmin',
            'guard_name'    => 'web'
        ]);
        $superadmin->givePermissionTo([
            'delete user',
            'update user',
            'read user',
            'create user',
            'delete role',
            'update role',
            'read role',
            'create role',
            'delete permission',
            'update permission',
            'read permission',
            'create permission'
        ]);
        Role::create([
            'name'          => 'admin',
            'guard_name'    => 'web'
        ]);
        Role::create([
            'name'          => 'operator',
            'guard_name'    => 'web'
        ]);
    }
}
