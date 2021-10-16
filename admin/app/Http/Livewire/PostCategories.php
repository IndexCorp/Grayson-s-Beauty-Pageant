<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Support\Str;

class PostCategories extends Component
{
    public $name;
    public $slug;
    public $description;

    public function mount()
    {
        $this->name = '';
        $this->slug = '';
        $this->description = '';
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function submit()
    {
        $data = ['name'=>$this->name, 'slug'=>$this->slug, 'description'=>$this->description];
        
        $validator = Validator::make($data, [
            'name'  =>  'required|unique:categories',
            'slug'  =>  'required',
            'description'   =>  'required'
        ]);

        if($validator->fails()) return session()->flash('error_toast', $validator->errors()->all());

        $category = new Category();

        $category->unique_id = Str::uuid();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->description = $this->description;

        $category->save();

        session()->flash('success_alert', 'Category created successfully');

        $this->mount();
    }

    public function delete($unique_id)
    {
        $unique_id = base64_decode($unique_id);
        $category = Category::where('unique_id', $unique_id);
        
        $posts = Post::where('category_id', $category->first()->id);
        $posts->delete();
        
        $category->delete();

        session()->flash('success_alert', 'Category deleted successfully');
    }

    public function render()
    {
        $categories = Category::all();
        $data = ['categories'=>$categories];
        return view('livewire.post-categories', $data)->layout('layouts.base');
    }
}
