<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use Livewire\Component;

class GalleryDetails extends Component
{
    public $gallery, $related;

    public function mount($slug)
    {
        $this->gallery = Gallery::where('slug', $slug)->first();
        $gallery_cat = $this->gallery->category_id;
        $this->related = Gallery::where('category_id', $gallery_cat)->latest()->get();
    }
    
    public function render()
    {
        return view('livewire.gallery-details');
    }
}
