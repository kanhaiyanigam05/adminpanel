<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'short_description', 'description', 'image', 'meta_title', 'meta_description', 'meta_keywords'];
}
