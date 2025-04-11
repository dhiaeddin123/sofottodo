<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function Symfony\Component\String\b;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alphaRole = Role::updateOrCreate(['name' => 'alpha', 'team_id' => 2]);
        $betaRole = Role::updateOrCreate(['name' => 'beta', 'team_id' => 3]);

        Permission::updateOrCreate(['name' => 'view_tasks']);
        Permission::updateOrCreate(['name' => 'create_tasks']);
        Permission::updateOrCreate(['name' => 'edit_tasks']);
        Permission::updateOrCreate(['name' => 'delete_tasks']);

        $alphaRole->givePermissionTo(['view_tasks']);
        $alphaRole->givePermissionTo(['create_tasks']);
        $alphaRole->givePermissionTo(['edit_tasks']);
        $alphaRole->givePermissionTo(['delete_tasks']);

        $betaRole->givePermissionTo(['view_tasks']);
        $betaRole->givePermissionTo(['edit_tasks']);
    }
}
