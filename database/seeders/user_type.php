<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class user_type extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_type')->insert([
            
            [
                'id' => 1,
                'user_type' => 'Admin',
            ],
            [
                'id' => 2,
                'user_type' => 'Human Resource',
            ],
            [
                'id' => 3,
                'user_type' => 'Candidate',
            ]
            ]);
    }
}
