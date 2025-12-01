<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Article;
use Livewire\Form;

class ArticleShow extends Component
{
    public Article $article;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.article-show');
    }
}
