<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class EditPost extends Component
{
    public $category;
    public $title;
    public $heading;
    public $slug;
    public $image;
    public $body;
    public $unique_id;
    public $post;
    public $o_image;
    
    public function mount($unique_id)
    {
        $this->unique_id = base64_decode($unique_id);

        $post = Post::where('unique_id', $this->unique_id)->first();

        $this->category = $post->category_id;
        $this->title = $post->title;
        $this->heading = $post->heading;
        $this->slug = $post->slug;
        $this->o_image = $post->image;
        $this->image = '';
        $this->body = $post->body;

        $this->post = $post;
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
            'title'     =>  'required',
            'heading'   =>  'required'
        ]);

        if($validate->fails()) return session()->flash('error_toast', $validate->errors()->all());

        $this->slug = Str::slug($this->title);
        $post =$this->post;

        $post->category_id = $this->category;
        $post->title = $this->title;
        $post->slug = $this->slug;
        $post->heading = $this->heading;

        if($this->image){
            $imageName = $this->slug.'.'.$this->image->extension();
            $this->image->storeAs('posts', $imageName);
            $post->image = $imageName;

            unlink(asset('storage/posts', $this->o_image));
        }

        $post->body = $this->body;

        $post->save();

        session()->flash('success_alert', 'Post Updated Successfully');

        return redirect()->route('post.view');
    }
    
    public function render()
    {
        $categories = Category::all();
        return view('livewire.edit-post', compact('categories'))->layout('layouts.base');
    }
}
