<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class BlogHome extends Component
{
    public function render()
    {
        $categories = Category::all();

        $featured = Post::orderBy('id', 'desc')->limit(10)->get();
        $recents = Post::orderBy('id', 'desc')->limit(5)->skip(10)->get();

        $data = ['featured'=>$featured, 'recents'=>$recents];
        return view('livewire.blog-home', $data)->layout('layouts.base', compact('categories'));
    }
}
