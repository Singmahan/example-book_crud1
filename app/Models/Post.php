<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    // relationship
    public function rAuthor(){
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function rCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
