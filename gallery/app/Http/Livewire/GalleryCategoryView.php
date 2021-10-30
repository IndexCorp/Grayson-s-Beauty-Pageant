<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Livewire\Component;

class GalleryCategoryView extends Component
{
    public $galleries, $uid;

    public function mount($slug)
    {
        $this->uid = GalleryCategory::where('slug', $slug)->first()->unique_id;
        $this->galleries = Gallery::where('category_id', $this->uid)->latest()->get();
    }

    public function render()
    {
        return view('livewire.gallery-category-view');
    }
}
