<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function getCreatedAtAttribute($value)
    {
        return gmdate('jS F Y, H:i:sa', strtotime($value));
    }
}
