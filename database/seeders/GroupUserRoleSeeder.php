<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GroupUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_user_roles')->insert([
            'id' =>'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2d',
            'group_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
            'title' => 'Test role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
