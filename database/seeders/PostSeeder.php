<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$kek = User::first('id')->pluck('id');


        DB::table('posts')->insert([
            'id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2b',
            'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
            'category_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2e',
            'title' => 'First post, seeded!',
            'body' => 'This is the body of the post',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
