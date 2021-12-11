<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'id' => Str::uuid()->toString(),
           'name' => 'Naddison',
           'email' => 'naddison@Laravello.co.uk',
           'password' => hash::make('kek'),
           'avatar' => 'kek.jpg',
           'last_active' => Carbon::now(),
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);
    }
}
