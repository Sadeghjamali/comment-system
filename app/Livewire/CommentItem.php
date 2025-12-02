<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateComment;
use App\Livewire\Forms\editForm;
use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;
    public CreateComment $replyForm;
    public editForm $editForm;
    public bool $deleted = false;

    public function reply()
    {
        $this->authorize('reply', $this->comment);
        $this->replyForm->validate();
        $reply = $this->comment->children()->make($this->replyForm->only('body'));
        $reply->user()->associate(auth()->user());
        $reply->save();

        $this->dispatch('replied', $this->comment->id);
        $this->replyForm->reset('body');
    }

    public function mount()
    {
        $this->editForm->body = $this->comment->body;
    }



    public function edit()
    {
        $this->authorize('edit', $this->comment);
        $this->editForm->validate();
        $this->comment->update($this->editForm->only('body'));

        $this->dispatch('edited', $this->comment->id);
        $this->editForm->reset('body');
    }

    public function delete()
    {
        $this->authorize('delete', $this->comment);
        $this->comment->delete();

        $this->deleted = true;
    }

    public function render()
    {
        return view('livewire.comment-item');
    }
}
