<?php

use App\Models\User;

class PostCRUD
{
    private function fixtures(): array
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        return [$user, $post];
    }

    public function test_a_user_can_create_a_post()
    {

    }

    public function test_a_user_can_view_a_post()
    {

    }

    public function test_a_user_can_edit_a_post_belonging_to_them()
    {

    }

    public function test_a_user_can_not_edit_a_post_belonging_to_another_user()
    {

    }

    public function test_a_user_can_soft_delete_a_post()
    {

    }

    public function test_a_user_can_not_soft_delete_a_post_belonging_to_another_user()
    {

    }
}
