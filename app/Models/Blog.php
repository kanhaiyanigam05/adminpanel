<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'url', 'image', 'short_description', 'description', 'meta_title', 'meta_keywords', 'meta_description', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
