<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Slider;
class SliderController extends Controller
{
    function index(){
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
}
