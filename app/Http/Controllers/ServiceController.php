<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index(){
        $categoryName = 'Service';
        $results =  DB::table('article')
        ->select('id','title')
        ->whereIn('id_category', function($query) use($categoryName){
            $query->select('id')->from('category')->where('name', $categoryName);
        })
        ->paginate(10);
        return view('admin.service.index',compact('results'));
    }
}
