<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
