<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'heading', 'sub_heading', 'image', 'second_image', 'description', 'button_text', 'button_link', 'extra1', 'extra2', 'extra3', 'extra4', 'extra5'];

    public function others()
    {
        return $this->hasMany(Other::class);
    }
}
