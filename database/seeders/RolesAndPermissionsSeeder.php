<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = ['create-record', 'edit-record', 'delete-record'];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $dataEntry = Role::firstOrCreate(['name' => 'data-entry']);
        $admin = Role::firstOrCreate(['name' => 'admin']);

        // Assign permissions to roles
        $dataEntry->givePermissionTo('create-record');
        $admin->givePermissionTo($permissions);

        // Create admin user if not exists
        $adminUser = User::firstOrCreate([
            'email' => 'admin@email.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('admin123'),
        ]);

        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin');
        }

        // Create a predefined "data entry" user if not exists
        $dataEntryUser = User::firstOrCreate([
            'email' => 'dataentry@email.com',
        ], [
            'name' => 'Data Entry',
            'password' => bcrypt('data123'),
        ]);

        if (!$dataEntryUser->hasRole('data-entry')) {
            $dataEntryUser->assignRole('data-entry');
        }
    }
}
