<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_friends')->insert([
            'id' => 1,
            'owner_user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
            'friend_user_id' => 'dd9920eb-1531-4eea-ab8a-fbaaeb831e3e',
            'deleted_at' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
