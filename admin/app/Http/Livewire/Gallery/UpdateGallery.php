<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\Validator;

class UpdateGallery extends Component
{
    public $title, $type, $image, $description, $category;
    public $video_url, $type_text, $o_image;

    public $gallery;

    public function mount($unique_id)
    {
        $uid = base64_decode($unique_id);
        $this->gallery = Gallery::where('unique_id', $uid)->first();

        $this->title = $this->gallery->title;
        $this->type = $this->gallery->type;
        $this->type_text = $this->gallery->type_text;
        $this->category = $this->gallery->category_id;
        $this->image = '';
        if($this->type == 2) $this->video_url = $this->gallery->url;
        $this->description = $this->gallery->description;
        $this->o_image = $this->gallery->url;
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
            'video_url' =>  $this->video_url
        ];

        $validate = '';

        $this->type = intval($this->type);

        $validate = Validator::make($data, [
            'title' => 'required',
            'type' => 'required|numeric',
            'category' => 'required',
        ]);

        if($validate->fails()) return session()->flash('error_alert', $validate->errors()->all()[0]);

        $gallery = $this->gallery;

        $url = '';

        $slug = Str::slug($this->title);

        if($this->type == 1){
            if($this->image){
                $imagename = $slug.'.'.$this->image->extension();
    
                $this->image->storeAs('gallery', $imagename);
                $url = $imagename;
                
                unlink(storage_path('app/public/gallery/'.$gallery->url));
            }else{
                $url = $gallery->url;
            }
        }

        if($this->type == 2){
            if($this->video_url){
                $url = $this->video_url;
            }else{
                $url = $gallery->url;
            }
        }

        $gallery->title = $this->title;
        $gallery->type = $this->type;
        $gallery->category_id = $this->category;
        $gallery->description = $this->description;
        $gallery->slug = $slug;
        $gallery->url = $url;

        $gallery->save();

        session()->flash('success_alert', 'Gallery Updated Successfully');

        return redirect()->route('gallery.add');
    }

    public function render()
    {
        $gcats = GalleryCategory::latest()->get();
        $galleries = Gallery::latest()->get();
        $gallery = $this->gallery;
        return view('livewire.gallery.update-gallery', compact('gcats', 'galleries', 'gallery'))->layout('layouts.base');
    }
}
