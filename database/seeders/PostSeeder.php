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
        DB::table('posts')->insert(
        [
            [
                'id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2b',
                'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
                'group_id' => null,
                'category_id' => 1,
                'public' => true,
                'title' => 'First post, seeded!',
                'body' => 'This is the body of the post',
                'img' => 'gremblo.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2k',
                'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
                'group_id' => 'dd9920eb-1532-4eaa-ab8a-fbbaeb831d3c',
                'category_id' => 2,
                'public' => false,
                'title' => 'Look at this group post',
                'body' => 'This is the body of the post',
                'img' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
