<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentChunk extends Component
{
    public array $ids=[];
    public function render()
    {
        return view('livewire.comment-chunk',[
            'comments' => Comment::query()
                ->whereIn('id', $this->ids)
                ->with(['user' ,'children'=>function($query){ 
                    $query->oldest('id')->with('user');
                }])
                ->orderByRaw('FIELD(id,'. implode(',', $this->ids).')' )
                // ->latest('id')
                ->get()
        ]);
    }
}
