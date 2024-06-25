<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 1
            ],
            [
                'email' => 'levanvu@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 1
            ],
        ];

        DB::table('vp_users')->insert($data);
        
    }
}
