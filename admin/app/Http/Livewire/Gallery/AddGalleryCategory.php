<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\Validator;

class AddGalleryCategory extends Component
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

        $category = new GalleryCategory();

        $category->unique_id = Str::uuid();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->description = $this->description;

        $category->save();

        session()->flash('success_alert', 'Gallery Category created successfully');

        $this->mount();
    }

    public function delete($unique_id)
    {
        $unique_id = base64_decode($unique_id);
        $category = GalleryCategory::where('unique_id', $unique_id);
        
        $gallery = Gallery::where('category_id', $category->first()->id);
        $gallery->delete();
        
        $category->delete();

        session()->flash('success_alert', 'Category deleted successfully');
    }



    public function render()
    {
        $gcats = GalleryCategory::latest()->get();
        return view('livewire.gallery.add-gallery-category', compact('gcats'))->layout('layouts.base');
    }
}
