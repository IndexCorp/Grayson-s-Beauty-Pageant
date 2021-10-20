<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class BlogPostDetails extends Component
{
    public $post;
    public $post_uid;
    public $slug;

    public $c_name;
    public $c_email;
    public $c_body;

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->first();
        $this->post_uid = $this->post->unique_id;
        $this->slug = $slug;
        $this->c_body = '';

        Session::get('com_name', $this->c_name);
        Session::get('com_email', $this->c_email);
    }

    public function storeComment()
    {
        Session::put('com_name', $this->c_name);
        Session::put('com_email', $this->c_email);

        $comment = new Comment();
        $comment->unique_id =  Str::uuid();
        $comment->post_uid =  $this->post_uid;
        $comment->name = $this->c_name;
        $comment->email = $this->c_email;
        $comment->body = $this->c_body;

        $comment->save();
        session()->flash('message', 'Comment added!');
        $this->mount($this->slug);
    }

    public function render()
    {
        $comments = Comment::where('post_uid', $this->post_uid)->get();
        $categories = Category::all();

        $data = ['comments'=>$comments];
        return view('livewire.blog-post-details', $data)->layout('layouts.base', compact('categories'));
    }
}
