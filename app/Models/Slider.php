<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slider';

    protected $fillable = [
        'name',
        'summary',
        'image',
        'link',
        'name_en',
        'summary_en',
        'image_en',
        'link_en',
        'status',
        'type',
    ];

    protected $guarded = [
        'id'
    ];
}
