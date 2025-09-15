<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@cms.com',
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        $superUserRole = Role::where('name', 'super_user')->first();
        $user->roles()->attach($superUserRole);
    }
}
