<?php

namespace App\Http\Livewire\Post;

use App\Models\Post\PostCommentRating as PostRatings;
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
        return view('livewire.post.rating');
    }

    public function getUpdatedRating(): int
    {
        $allUpvotesAfterVoteCast = PostRatings::where('upvote', 1)->where('post_id', $this->post_id)->count();
        $allDownvotesAfterVoteCast = PostRatings::where('downvote', 1)->where('post_id', $this->post_id)->count();

        return $allUpvotesAfterVoteCast - $allDownvotesAfterVoteCast;
    }

    public function hasUpvoted()
    {
        return PostRatings::where('upvote', 1)->where('post_id', $this->post_id)->where('user_id', auth()->id())->first();
    }

    public function hasDownvoted()
    {
        return PostRatings::where('downvote', 1)->where('post_id', $this->post_id)->where('user_id', auth()->id())->first();
    }

    public function upvote($upvote)
    {
        if ($rating = $this->hasDownvoted()) {
            PostRatings::find($rating->id)->delete();
        }

        if ($rating = $this->hasUpvoted()) {
            PostRatings::find($rating->id)->delete();
        } else {
            PostRatings::create([
                'post_id' => $this->post_id,
                'user_id' => auth()->id(),
                'upvote' => $upvote
            ]);
        }

        setUserActivity();

        $this->rating_sum = $this->getUpdatedRating();
    }

    public function downvote($downvote)
    {
       if ($rating = $this->hasUpvoted()) {
            PostRatings::find($rating->id)->delete();
        }

        if ($rating = $this->hasDownvoted()) {
            PostRatings::find($rating->id)->delete();
        } else {
            PostRatings::create([
                'post_id' => $this->post_id,
                'user_id' => auth()->id(),
                'downvote' => $downvote
            ]);
        }

        setUserActivity();

        $this->rating_sum = $this->getUpdatedRating();
    }
}
