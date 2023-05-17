<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentsSection extends Component
{
    public $postId;
    public $comment;
    public $comments = [];

    public function addComment()
    {
        array_push($this->comments, [
            'body' => $this->comment,
            'user_id' => auth()->user()->id,
            'post_id' => $this->postId,
        ]);

        $this->comment = '';
    }
    public function render()
    {
        return view('livewire.comments-section');
    }
}

