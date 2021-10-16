<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddPost extends Component
{
    public $category;
    public $title;
    public $heading;
    public $slug;
    public $image;
    public $body;

    
    public function mount()
    {
        $this->category = '';
        $this->title = '';
        $this->heading = '';
        $this->slug = '';
        $this->image = '';
        $this->body = '';
    }
    
    use WithFileUploads;
    
    public function submit()
    {
        $data = [
            'category'  =>  $this->category,
            'title'     =>  $this->title,
            'heading'   =>  $this->heading,
            'image'     =>  $this->image
        ];
        $validate = Validator::make($data, [
            'category'  =>  'required',
            'title'     =>  'required|unique:posts',
            'heading'   =>  'required',
            'image'     =>  'required|image'
        ]);

        if($validate->fails()) return session()->flash('error_toast', $validate->errors()->all());

        $this->slug = Str::slug($this->title);
        $post = new Post();

        $post->unique_id = Str::uuid();
        $post->category_id = $this->category;
        $post->title = $this->title;
        $post->slug = $this->slug;
        $post->heading = $this->heading;

        $imageName = $this->slug.'.'.$this->image->extension();
        $this->image->storeAs('posts', $imageName);

        $post->image = $imageName;
        $post->body = $this->body;

        $post->save();

        session()->flash('success_alert', 'Post Created Successfully');

        $this->mount();
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.add-post', compact('categories'))->layout('layouts.base');
    }
}
