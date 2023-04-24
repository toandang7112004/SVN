<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = new Zone();
        $cs = $zones->getList();
        return view('admin.zone.index', compact('cs'));
    }
}
