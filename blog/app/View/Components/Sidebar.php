<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = Category::all();
        $recent = Post::orderBy('id', 'desc')->limit(10)->get();
        $data = ['categories'=>$categories, 'recent'=>$recent];
        return view('components.sidebar', $data);
    }
}
