<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

class AddGallery extends Component
{
    public $title, $type, $image, $video, $description, $category;

    public function mount()
    {
        $this->title = '';
        $this->type = 0;
        $this->category = '';
        $this->image = '';
        $this->video = '';
        $this->description = '';
    }

    use WithFileUploads;

    public function store()
    {
        $data = [
            'title' => $this->title,
            'type' => $this->type,
            'category' => $this->category,
            'description' => $this->description,
            'image' =>  $this->image,
            'video' =>  $this->video
        ];

        $validate = '';

        $this->type = intval($this->type);

        if($this->type == 1){
            $validate = Validator::make($data, [
                'title' => 'required|unique:galleries',
                'type' => 'required|numeric',
                'category' => 'required',
                'image' =>'required|image'
            ]);
        }
        elseif($this->type == 2){
            $validate = Validator::make($data, [
                'title' => 'required|unique:galleries',
                'type' => 'required|numeric',
                'category' => 'required',
                'video' =>'required|url'
            ]);
        }else{
            return session()->flash('error_toast', 'Invalid gallery type');
        }

        if($validate->fails()) return session()->flash('error_alert', $validate->errors()->all()[0]);

        $gallery = new Gallery();

        $url = $this->video;

        $slug = Str::slug($this->title);

        if($this->type == 1){
            $imagename = $slug.'.'.$this->image->extension();

            $this->image->storeAs('gallery', $imagename);
            $url = $imagename;
        }

        $gallery->unique_id = Str::uuid();
        $gallery->title = $this->title;
        $gallery->type = $this->type;
        $gallery->category_id = $this->category;
        $gallery->description = $this->description;
        $gallery->slug = $slug;
        $gallery->url = $url;

        $gallery->save();

        session()->flash('success_alert', 'Gallery Added Successfully');

        $this->mount();
    }

    public function render()
    {
        $galleries = Gallery::latest()->get();
        $gcats = GalleryCategory::latest()->get();
        return view('livewire.gallery.add-gallery', compact('galleries', 'gcats'))->layout('layouts.base');
    }
}
