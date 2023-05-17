<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MusicController extends Controller
{
    public function index(){
        $categoryName = ['Bolero', 'Trữ Tình', 'Không Lời','Nhạc US'];
        $results =  DB::table('article')
            ->join('category', 'article.id_category', '=', 'category.id')
            ->whereIn('category.name', $categoryName)
            ->select('article.image','article.title' , 'category.name')->get();
        return response()->json($results);
    }
}
