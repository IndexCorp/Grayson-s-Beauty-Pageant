<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\Validator;

class UpdateGalleryCategory extends Component
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

        $category = GalleryCategory::where('unique_id', $this->unique_id)->first();
        
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

        $category = GalleryCategory::where('unique_id', $this->unique_id)->first();

        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->description = $this->description;

        $category->save();

        session()->flash('success_alert', 'Gallery Category updated successfully');

        return redirect()->route('gallery.cat.add');
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
        return view('livewire.gallery.update-gallery-category', compact('gcats'))->layout('layouts.base');
    }
}
