<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_admins')->insert([
           'id' => Str::uuid()->toString(),
           'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);
    }
}
