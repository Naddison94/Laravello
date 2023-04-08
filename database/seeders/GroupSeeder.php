<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert(
        [
            [
                'id' => 'dd9920eb-1532-4eaa-ab8a-fbbaeb831d3c',
                'name' => 'Test Group',
                'description' => 'Test description',
                'settings' => json_encode([
                    'public' => true,
                    'invite_only' => false,
                    'custom_colours' => ['background' => '#286ec9', 'text' => '#c21d49'],
                    'rules' => ['Be nice', 'Be cool'],
                    'links' => [
                        ['link' => 'https://www.google.com', 'custom_name' => 'Google Yo', 'colour' => '#57188f'],
                        ['link' => 'https://www.reddit.com', 'custom_name' => 'Reddit Yo', 'colour' => '#e07722']
                    ],
                    'tags' => ['kek', 'Noice'],
                    'roles' => [
                        ['title' => 'Moderator', 'display_order' => 1, 'admin' => true, 'colour' => '#d1b40d'],
                        ['title' => 'Dude', 'display_order' => 2, 'admin' => false, 'add_post' => true, 'comment' => true, 'invite' => true, 'colour' => '#c21d49'],
                        ['title' => 'Lurker', 'display_order' => 3, 'admin' => false, 'add_post' => false, 'comment' => true, 'invite' => false, 'colour' => '#33b80f']
                    ],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 'dd9920eb-1542-4eaa-ab8a-fbbaeb831d3d',
                'name' => 'Test Group 2',
                'description' => 'Test description 2',
                'settings' => json_encode([
                    'public' => false,
                    'invite_only' => true,
                    'rules' => [
                        'Be bad',
                        'Be not cool'
                    ],
                    'links' => [
                        ['link' => 'https://www.google.com', 'custom_name' => 'boop', 'colour' => '#57188f']
                    ],
                    'tags' => [
                        'lel', 'heh'
                    ],
                    'roles' => [
                        ['title' => 'Moderator', 'display_order' => 1, 'admin' => true, 'colour' => '#d1b40d'],
                        ['title' => 'pleb', 'display_order' => 2, 'admin' => false, 'add_post' => true, 'comment' => true, 'invite' => true, 'colour' => '#c21d49']
                    ],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
