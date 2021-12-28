<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'id' => 'dd9920eb-1531-4eaa-ab8a-fbbaeb831d2a',
            'user_id' => 'dd9920eb-1531-4eaa-ab8a-fbaaeb831d2c',
            'category_id' => 3,
            'status_id' => 3,
            'priority_id' => 1,
            'title' => 'This is a seeded task',
            'body' => 'This is the body of the task',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
