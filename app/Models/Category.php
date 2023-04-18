<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = [
        'slug',
        'name',
        'title',
        'detail',
        'image',
        'meta_url',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_image',
        'slug_en',
        'name_en',
        'title_en',
        'detail_en',
        'image_en',
        'meta_url_en',
        'meta_title_en',
        'meta_description_en',
        'meta_keyword_en',
        'meta_image_en',
        'parent_id',
        'status',
        'id_user',
        'created_at',
        'updated_at'
    ];

    protected $guarded = [
        'id'
    ];
}
