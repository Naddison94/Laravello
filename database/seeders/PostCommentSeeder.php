<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_comments')->insert([
            [
                'id' => 1,
                'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
                'post_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2b',
                'reply_id' => null,
                'comment' => 'This is a comment.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
                'post_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2b',
                'reply_id' => 1,
                'comment' => 'This is a reply!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
