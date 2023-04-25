<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            ->paginate(10);
        return view('admin.menu.index', compact('results'));
    }
    public function create()
    {
        $cate = Category::where('id', '=', '8')->get();
        return view('admin.menu.create',compact('cate'));
    }
    public function store(Request $request)
    {
        $data = new Article();
        $slug_vi = Str::slug($request->title, $separator = '-');
        $check_vi = $data::where('slug', '=', $slug_vi)->get();
        if (count($check_vi) == 1) {
            $slug_vi = $slug_vi . "-" . time();
        }
        $data->slug = $slug_vi;
        $data->title = $request->title;
        $data->summary = $request->summary;
        $get_image = $request->file('image');
        $get_name_image = $get_image->getClientOriginalName();
        $path = 'public/uploads/';
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $data->image = $new_image;
        $data->id_category = 8;
        $data->status = 1;
        $data->id_user = Auth::user()->id;
        $result = $data->save();
        if ($result == 1) {
            toast("Bạn thêm thành công $data->name", 'success', 'top-right');
            return redirect()->route('menu.index');
        }
    }
    public function edit( $id ){
        $menu = Article::find($id);
        return view('admin.menu.edit',compact('menu'));
    }
    public function update( $id , Request $request){
        $data = Article::find($id);
        $slug_vi = Str::slug($request->title, $separator = '-');
        $check_vi = $data::where('slug', '=', $slug_vi)->get();
        if (count($check_vi) == 1) {
            $slug_vi = $slug_vi . "-" . time();
        }
        $data->slug = $slug_vi;
        $data->title = $request->title;
        $data->summary = $request->summary;
        $get_image = $request->file('image');
        $get_name_image = $get_image->getClientOriginalName();
        $path = 'public/uploads/';
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $data->image = $new_image;
        $data->id_category = 8;
        $data->status = 1;
        $data->id_user = Auth::user()->id;
        $result = $data->save();
        if ($result == 1) {
            toast("Bạn sửa thành công $data->name", 'success', 'top-right');
            return redirect()->route('menu.index');
        }
    }
    public function delete( $id ){
        $menu = Article::find($id)->delete();
        return redirect()->route('menu.index');
    }
}
