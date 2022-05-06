<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert(
        [
            [
                'id' => 'dd9920eb-1532-4eaa-ab8a-fbbaeb831d3c',
                'name' => 'Test Group',
                'description' => 'Test description',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 'dd9920eb-1542-4eaa-ab8a-fbbaeb831d3d',
                'name' => 'Test Group 2',
                'description' => 'Test description 2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
