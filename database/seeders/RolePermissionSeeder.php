<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $employeeRole = Role::create(['name' => 'employee']);

        // Create permissions
        $userEditPermission = Permission::create(['name'=>'edit users']);
        $userDeletePermission = Permission::create(['name'=>'delete users']);
        $conferenceCreatePermission = Permission::create(['name'=>'create conferences']);
        $conferenceEditPermission = Permission::create(['name'=>'edit conferences']);
        $conferenceDeletePermission = Permission::create(['name'=>'delete conferences']);

        $viewPermission = Permission::create(['name'=>'view conferences']);
        $registrationCreatePermission = Permission::create(['name'=>'create registrations']);
        $employeeViewPermission = Permission::create(['name'=>'view all conferences',]);

        // Assign permissions to roles
        $adminRole->givePermissionTo($userEditPermission, $userDeletePermission,
            $conferenceCreatePermission, $conferenceEditPermission, $conferenceDeletePermission,
            $viewPermission);
        $userRole->givePermissionTo($viewPermission, $registrationCreatePermission);
        $employeeRole->givePermissionTo($employeeViewPermission);

        // Assign role to user
        $users = User::all(); // Example user with ID 1
        foreach ($users as $user) {
            $user->assignRole('user');
        }

    }
}
