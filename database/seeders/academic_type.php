<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class academic_type extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academic_type')->insert([
            
            [
                'id' => 1,
                'academic_type' => '10th',
            ],
            [
                'id' => 2,
                'academic_type' => '12th',
            ],
            [
                'id' => 3,
                'academic_type' => 'graduation',
            ],
            [
                'id' => 4,
                'academic_type' => 'post graduation',
            ]
            ]);
    }
}
