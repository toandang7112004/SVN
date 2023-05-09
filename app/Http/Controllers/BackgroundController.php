<?php

namespace App\Http\Controllers;

use App\Models\Background;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    public function index(){
        $background = Background::find(1);
        return view('admin.background.background',compact('background'));
    }
}
