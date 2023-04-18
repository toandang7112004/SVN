<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneService extends Model
{
    use HasFactory;
    protected $table = 'zone_service';
    protected $guarded = [
        'id'
    ];
}
