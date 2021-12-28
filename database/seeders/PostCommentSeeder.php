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
        $comment_id = Str::uuid()->toString();
        DB::table('post_comments')->insert([
            [
                'id' => $comment_id,
                'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
                'post_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2b',
                'reply_id' => null,
                'comment' => 'This is a comment.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid()->toString(),
                'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
                'post_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2b',
                'reply_id' => $comment_id,
                'comment' => 'This is a reply!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
