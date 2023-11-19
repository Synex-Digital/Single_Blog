<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditiorPick extends Model
{
    use HasFactory;
    function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
