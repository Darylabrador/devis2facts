<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['email' => 'admin@admin.admin',
            'password' => bcrypt('admin'),
            'role_id' => 1,
            ]
        ];
        $roles = [
            [
                'id' => 1,
                'name' => 'Admin',
            ]
        ];

        DB::table('roles')->insert(
            $roles
        );

        DB::table('users')->insert(
            $array
        );
    }
}
