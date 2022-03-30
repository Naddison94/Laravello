<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class CreatePostModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.create-post-modal');
    }
}
