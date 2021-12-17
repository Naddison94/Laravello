<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2b',
            'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
            'category_id' => 1,
            'title' => 'First post, seeded!',
            'body' => 'This is the body of the post',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
