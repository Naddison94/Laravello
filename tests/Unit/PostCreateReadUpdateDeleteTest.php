<?php

use App\Http\Controllers\Post\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Request;
use Tests\TestCase;

class PostCreateReadUpdateDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function createFixtures()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        return [$user, $post];
    }

    public function test_a_user_can_create_a_post()
    {
        list($user, $post) = $this->createFixtures();

        $this->actingAs($user);

        $request = Request::create(route('post.store'), 'POST',[
            'id' => $post->id,
            'title' => $post->title,
            'body' => $post->body,
            'img' => $post->img
        ]);

        $postController = new PostController;

        $postController->store($request);

        $this->assertDatabaseHas('Posts', ['id' => $post->id]);
    }

    public function test_a_user_can_view_all_posts()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'login' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get(route('post.index'));
        $response->assertStatus(200);
    }

//    public function test_a_user_can_view_a_post()
//    {
//
//    }
//
//    public function test_a_user_can_edit_a_post_belonging_to_them()
//    {
//
//    }
//
//    public function test_a_user_can_not_edit_a_post_belonging_to_another_user()
//    {
//
//    }
//
//    public function test_a_user_can_soft_delete_a_post()
//    {
//
//    }
//
//    public function test_a_user_can_not_soft_delete_a_post_belonging_to_another_user()
//    {
//
//    }
}
