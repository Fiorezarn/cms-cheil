<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'super_user',
            'display_name' => 'Super User',
            'description' => 'Has full access to the system including user management'
        ]);

        Role::create([
            'name' => 'user_viewer',
            'display_name' => 'User Viewer',
            'description' => 'Can only view content, limited access'
        ]);
    }
}
