<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configs extends Model
{
    use HasFactory;
    protected $table = 'configs';

    protected $fillable = [
        'icon_website',
        'title_website',
        'meta_keyword',
        'meta_description',
        'meta_image',
        'meta_title',
        'title_website_en',
        'meta_keyword_en',
        'meta_description_en',
        'meta_orther',
        'meta_title_en',
        'meta_image_en',
        'mete_url',
        'mete_url_en',
    ];

    protected $guarded = [
        'id'
    ];
}
