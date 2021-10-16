<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ViewPosts extends Component
{
    use WithPagination;

    public function delete($unique_id)
    {
        $unique_id = base64_decode($unique_id);
        $posts = Post::where('unique_id', $unique_id);
        $posts->delete();

        session()->flash('success_alert', 'Post deleted successfully');
    }

    public function render()
    {
        $posts = Post::paginate(2);
        return view('livewire.view-posts', compact('posts'))->layout('layouts.base');
    }
}
