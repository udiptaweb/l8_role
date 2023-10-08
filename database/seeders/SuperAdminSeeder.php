<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(['email' => 'super@gmail.com'],[
            'name' => 'Super Admin',
            'email' => 'super@gmail.com',
            'password' => Hash::make('123@#$')
        ]);
        $role = Role::where('name','Super Admin')->first();
        if($role){
            $user->assignRole($role);
        }
    }
}
