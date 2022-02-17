<?php

namespace App\Http\Livewire\Post;

use App\Models\Post\Rating as PostRatings;
use Livewire\Component;

class Rating extends Component
{
    public $post_id;
    public $rating_sum;

    public function mount($post_id, $upvotes = 0, $downvotes = 0)
    {
        $this->post_id = $post_id;
        $this->rating_sum = $upvotes - $downvotes;
    }

    public function render()
    {
        return view('livewire.post.ratings');
    }

    public function upvote($upvote)
    {
        $hasUpvotedPost = PostRatings::where('upvote', 1)->where('post_id', $this->post_id)->where('user_id', auth()->id())->first();
        $hasDownvotedPost = PostRatings::where('downvote', 1)->where('post_id', $this->post_id)->where('user_id', auth()->id())->first();


        if ($hasDownvotedPost) {
            $rating = PostRatings::find($hasDownvotedPost->id);
            $rating->delete();
        }

        if ($hasUpvotedPost) {
            $rating = PostRatings::find($hasUpvotedPost->id);
            $rating->delete();
        } else {
            PostRatings::create([
                'post_id' => $this->post_id,
                'user_id' => auth()->id(),
                'upvote' => $upvote
            ]);
        }

        $allUpvotesAfterVoteCast = PostRatings::where('upvote', 1)->where('post_id', $this->post_id)->count();
        $allDownvotesAfterVoteCast = PostRatings::where('downvote', 1)->where('post_id', $this->post_id)->count();

        $this->rating_sum = $allUpvotesAfterVoteCast - $allDownvotesAfterVoteCast;
    }

    public function downvote($downvote)
    {
        $hasUpvotedPost = PostRatings::where('upvote', 1)->where('post_id', $this->post_id)->where('user_id', auth()->id())->first();
        $hasDownvotedPost = PostRatings::where('downvote', 1)->where('post_id', $this->post_id)->where('user_id', auth()->id())->first();

        if ($hasUpvotedPost) {
            $rating = PostRatings::find($hasUpvotedPost->id);
            $rating->delete();
        }

        if ($hasDownvotedPost) {
            $rating = PostRatings::find($hasDownvotedPost->id);
            $rating->delete();
        } else {
            PostRatings::create([
                'post_id' => $this->post_id,
                'user_id' => auth()->id(),
                'downvote' => $downvote
            ]);
        }

        $allUpvotesAfterVoteCast = PostRatings::where('upvote', 1)->where('post_id', $this->post_id)->count();
        $allDownvotesAfterVoteCast = PostRatings::where('downvote', 1)->where('post_id', $this->post_id)->count();

        $this->rating_sum = $allUpvotesAfterVoteCast - $allDownvotesAfterVoteCast;
    }
}
