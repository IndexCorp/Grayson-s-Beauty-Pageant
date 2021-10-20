<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $appends = ['category_name', 'num_comments'];

    public function getCategoryNameAttribute()
    {
        $cat_id = $this->original['category_id'];

        $cat = Category::where('id', $cat_id)->first();

        return $cat->name;
    }

    public function getCreatedAtAttribute($value)
    {
        return gmdate('jS F Y, H:i:sa', strtotime($value));
        // return $value->diffForHumans
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function getNumCommentsAttribute()
    {
        $uid = $this->original['unique_id'];

        $numcomments = Comment::where('post_uid', $uid)->count();
        return $numcomments;
    }
}
