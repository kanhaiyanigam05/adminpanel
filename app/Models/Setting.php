<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['site_name', 'logo_light', 'logo_dark', 'favicon', 'primary', 'secondary', 'phone1', 'phone2', 'email', 'address', 'map', 'facebook', 'instagram', 'twitter', 'linkedin', 'youtube', 'footer_description', 'header_script', 'body_script', 'footer_script'];
}
