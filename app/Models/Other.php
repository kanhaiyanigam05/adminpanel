<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    use HasFactory;
    protected $fillable = ['content_id', 'heading', 'description', 'image', 'button_text', 'button_link'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
