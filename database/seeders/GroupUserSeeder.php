<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_users')->insert([
            'id' => str::uuid(),
            'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
            'group_id' => 'dd9920eb-1532-4eaa-ab8a-fbbaeb831d3c',
            'group_user_role_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2d',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
