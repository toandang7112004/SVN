<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneCustomer extends Model
{
    use HasFactory;
    protected $table = 'zone_customer';
    protected $guarded = [
        'id'
    ];
}
