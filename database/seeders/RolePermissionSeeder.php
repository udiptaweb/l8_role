<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Super Admin',
            'Admin',
            'Student',
            'Instructor',
            'DEO'
        ];
        $permissions = [
            'Create Student',
            'Create Instructor',
            'Create DEO',
            'Create Class',
            'Create Assignment',
            'Edit Student',
            'Edit Instructor',
            'Edit DEO',
            'Edit Class',
            'Edit Assignment',
            'Delete Student',
            'Delete Instructor',
            'Delete DEO',
            'Delete Class',
            'Delete Assignment',
        ];
        foreach($roles as $role){
            Role::firstOrCreate(['name' => $role],['name' => $role]);
        }
        foreach($permissions as $permission){
            Permission::firstOrCreate(['name' => $permission],['name' => $permission]);
        }
    }
}
