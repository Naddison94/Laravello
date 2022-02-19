<?php

namespace App\Http\Livewire\Post\Comment;

use App\Models\Post\PostCommentRating;
use Livewire\Component;

class Rating extends Component
{
    public $comment_id;
    public $rating_sum;

    public function mount($comment_id, $upvotes = 0, $downvotes = 0)
    {
        $this->comment_id = $comment_id;
        $this->rating_sum = $upvotes - $downvotes;
    }

    public function render()
    {
        return view('livewire.post.comment.rating');
    }

    public function getUpdatedRating(): int
    {
        $allUpvotesAfterVoteCast = PostCommentRating::where('upvote', 1)->where('comment_id', $this->comment_id)->count();
        $allDownvotesAfterVoteCast = PostCommentRating::where('downvote', 1)->where('comment_id', $this->comment_id)->count();

        return $allUpvotesAfterVoteCast - $allDownvotesAfterVoteCast;
    }

    public function hasUpvoted()
    {
        return PostCommentRating::where('upvote', 1)->where('comment_id', $this->comment_id)->where('user_id', auth()->id())->first();
    }

    public function hasDownvoted()
    {
        return PostCommentRating::where('downvote', 1)->where('comment_id', $this->comment_id)->where('user_id', auth()->id())->first();
    }

    public function upvote($upvote)
    {
        if ($rating = $this->hasDownvoted()) {
            PostCommentRating::find($rating->id)->delete();
        }

        if ($rating = $this->hasUpvoted()) {
            PostCommentRating::find($rating->id)->delete();
        } else {
            PostCommentRating::create([
                'comment_id' => $this->comment_id,
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
            PostCommentRating::find($rating->id)->delete();
        }

        if ($rating = $this->hasDownvoted()) {
            PostCommentRating::find($rating->id)->delete();
        } else {
            PostCommentRating::create([
                'comment_id' => $this->comment_id,
                'user_id' => auth()->id(),
                'downvote' => $downvote
            ]);
        }

        setUserActivity();

        $this->rating_sum = $this->getUpdatedRating();
    }
}
