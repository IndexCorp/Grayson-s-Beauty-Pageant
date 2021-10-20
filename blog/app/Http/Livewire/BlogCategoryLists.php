<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class BlogCategoryLists extends Component
{
    public $category;

    public function mount($slug)
    {
        $this->category = Category::where('slug', $slug)->first();
    }

    use WithPagination;

    public function render()
    {
        $categories = Category::all();

        $posts = Post::where('category_id', $this->category->id)->paginate(12);

        $data = ['posts'=>$posts];

        return view('livewire.blog-category-lists', $data)->layout('layouts.base', compact('categories'));
    }
}
