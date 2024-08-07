<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryRoles = [
            ['roleID' => 1, 'roleName' => 'Super Admin', 'description' => 'Role for Super Admin'],
            ['roleID' => 2, 'roleName' => 'Admin', 'description' => 'Role for Admin'],
        ];
        foreach ($aryRoles as $role) {
            DB::table('roles')->insert([
                'roleID' => $role['roleID'],
                'roleName' => $role['roleName'],
                'description' => $role['description']
            ]);
        }
    }
}
