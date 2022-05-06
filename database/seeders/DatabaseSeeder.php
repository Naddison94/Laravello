<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            UserFriendsSeeder::class,
            UserAdminSeeder::class,
            PostCategorySeeder::class,
            PostSeeder::class,
            PostCommentSeeder::class,
            TaskCatergorySeeder::class,
            TaskStatusSeeder::class,
            TaskPrioritySeeder::class,
            TaskSeeder::class,
            TaskCommentSeeder::class,
            GroupSeeder::class,
            GroupUserSeeder::class,
            GroupUserRoleSeeder::class,
        ]);
    }
}
