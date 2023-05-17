<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $categoryName = 'Menu';
        $results =  DB::table('article')
            ->select('id', 'title')
            ->whereIn('id_category', function ($query) use ($categoryName) {
                $query->select('id')->from('category')->where('name', $categoryName);
            })
            ->get();
        return response()->json($results);
    }
}
