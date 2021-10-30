<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public $appends = ['type_text'];

    public function getTypeTextAttribute()
    {
        $val = $this->original['type'];

        if($val == 1) return 'Image';
        else return 'Video';
    }
}
