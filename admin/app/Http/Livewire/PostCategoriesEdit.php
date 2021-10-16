<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PostCategoriesEdit extends Component
{
    public $name;
    public $slug;
    public $description;
    public $unique_id;
    public $o_uid;

    public function mount($unique_id)
    {
        $this->unique_id = base64_decode($unique_id);
        $this->o_uid = $unique_id;

        $category = Category::where('unique_id', $this->unique_id)->first();
        
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->description = $category->description;

    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function submit()
    {
        $data = ['name'=>$this->name, 'slug'=>$this->slug, 'description'=>$this->description];
        
        $validator = Validator::make($data, [
            'name'  =>  'required',
            'slug'  =>  'required',
            'description'   =>  'required'
        ]);

        if($validator->fails()) return session()->flash('error_toast', $validator->errors()->all());

        $category = Category::where('unique_id', $this->unique_id)->first();

        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->description = $this->description;

        $category->save();

        session()->flash('success_alert', 'Category updated successfully');

        return redirect()->route('post.categories');
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
        return view('livewire.post-categories-edit', $data)->layout('layouts.base');
    }
}
