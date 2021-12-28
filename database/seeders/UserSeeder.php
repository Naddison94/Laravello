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
            [
               'id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
               'name' => 'Naddison',
               'email' => 'naddison@laravello.co.uk',
               'password' => hash::make('kek'),
               'avatar' => 'avatar_default.jpg',
               'banner' => 'banner_default.png',
               'bio' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.',
               'last_active' => Carbon::now(),
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
            ],
            [
               'id' => 'dd9920eb-1531-4eea-ab8a-fbaaeb831e3e',
               'name' => 'Bradford',
               'email' => 'bradford@laravello.co.uk',
               'password' => hash::make('kek'),
                'avatar' => null,
                'banner' => null,
               'bio' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.',
               'last_active' => Carbon::now(),
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
