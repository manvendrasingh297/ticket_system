<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin@123'),
            'profile' => 'user.avif'
        ]);

        $employee1 = User::create([
            'name'=>'employee1',
            'email'=>'employee1@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        $employee2 = User::create([
            'name'=>'employee2',
            'email'=>'employee2@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        $admin_role = Role::create(['name' => 'admin']);
        $emp_role = Role::create(['name' => 'employee']);

        $permission = Permission::create(['name' => 'Post access']);
        $permission = Permission::create(['name' => 'Post edit']);
        $permission = Permission::create(['name' => 'Post create']);
        $permission = Permission::create(['name' => 'Post delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        $permission = Permission::create(['name' => 'Mail access']);
        $permission = Permission::create(['name' => 'Mail edit']);

        $permission = Permission::create(['name' => 'Ticket access']);
        $permission = Permission::create(['name' => 'Ticket edit']); 
        $permission = Permission::create(['name' => 'Ticket delete']);


        $admin->assignRole($admin_role);
        $employee1->assignRole($emp_role);
        $employee2->assignRole($emp_role);


        $admin_role->givePermissionTo(Permission::all());
    }
}
