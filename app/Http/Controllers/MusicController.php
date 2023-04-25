<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\music\StoreMusicRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MusicController extends Controller
{
    public function index()
    {
        $categoryName = ['Bolero', 'Trữ Tình', 'Không Lời','Nhạc US'];
        $results =  DB::table('article')
            ->join('category', 'article.id_category', '=', 'category.id')
            ->whereIn('category.name', $categoryName)
            ->select('article.*', 'category.name')
            ->paginate(10);
        return view('admin.music.index', compact('results'));
    }
    public function create()
    {
        $cate = Category::where(array('parent_id' => 11))->where('id', '!=', '11')->get();
        return view('admin.music.create', compact('cate'));
    }
    public function store(StoreMusicRequest $request)
    {
        $data = new Article();
        $slug_vi = Str::slug($request->title, $separator = '-');
        $slug_en = Str::slug($request->title_en, $separator = '-');
        $check_vi = $data::where('slug', '=', $slug_vi)->get();
        $check_en = $data::where('slug_en', '=', $slug_en)->get();
        if (count($check_vi) == 1) {
            $slug_vi = $slug_vi . "-" . time();
        }
        if (count($check_en) == 1) {
            $slug_en = $slug_en . "-" . time();
        }
        $data->slug = $slug_vi;
        $data->title = $request->title;
        $data->summary = $request->summary;
        $data->detail = $request->detail;

        $get_image = $request->file('image');
        $get_name_image = $get_image->getClientOriginalName();
        $path = 'public/uploads/';
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $data->image = $new_image;

        $data->id_category = $request->id_category;
        if ($request->meta_url == null) {
            $data->meta_url = Str::slug($request->title, $separator = '-');
        } else {
            $data->meta_url = $request->meta_url;
        }
        $data->meta_title =  $request->meta_title;
        $data->meta_description =  $request->meta_description;
        $data->meta_keyword =  $request->meta_keyword;
        $data->meta_image =  $request->meta_image;
        $data->slug_en = $slug_en;
        $data->title_en = $request->title_en;
        $data->summary_en = $request->summary_en;
        $data->detail_en = $request->detail_en;
        $data->image_en = $request->image_en;
        if ($request->meta_url_en == null) {
            $data->meta_url_en = Str::slug($request->title_en, $separator = '-');
        } else {
            $data->meta_url_en = $request->meta_url_en;
        }
        $data->meta_title_en = $request->meta_title_en;
        $data->meta_description_en = $request->meta_description_en;
        $data->meta_keyword_en = $request->meta_keyword_en;
        $data->meta_image_en = $request->meta_image_en;
        $data->status = 1;
        $data->id_user = Auth::user()->id;
        $result = $data->save();
        if ($result == 1) {
            toast("Bạn thêm thành công $data->name", 'success', 'top-right');
            return redirect()->route('music.index');
        }
    }
    public function delete($id)
    {
        $result = Article::find($id)->delete();
        if ($result == 'true') {
            toast("Bạn đã xóa thành công ", 'success', 'top-right');
            return redirect()->route('music.index');
        }
    }
    public function edit($id)
    {
        $musics = Article::find($id);
        $cate = Category::where(array('parent_id' => 11))->where('id', '!=', '11')->get();
        // dd($cate);
        // dd($musics->image );
        return view('admin.music.edit', compact('musics', 'cate'));
    }
    public function update($id, Request $request)
    {
        $data = Article::find($id);
        $slug_vi = Str::slug($request->title, $separator = '-');
        $slug_en = Str::slug($request->title_en, $separator = '-');
        $check_vi = $data::where('slug', '=', $slug_vi)->get();
        $check_en = $data::where('slug_en', '=', $slug_en)->get();
        if (count($check_vi) == 1) {
            $slug_vi = $slug_vi . "-" . time();
        }
        if (count($check_en) == 1) {
            $slug_en = $slug_en . "-" . time();
        }
        $data->slug = $slug_vi;
        $data->title = $request->title;
        $data->summary = $request->summary;
        $data->detail = $request->detail;

        $get_image = $request->file('image');
        $get_name_image = $get_image->getClientOriginalName();
        $path = 'public/uploads/';
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $data->image = $new_image;

        $data->id_category = $request->id_category;
        if ($request->meta_url == null) {
            $data->meta_url = Str::slug($request->title, $separator = '-');
        } else {
            $data->meta_url = $request->meta_url;
        }
        $data->meta_title =  $request->meta_title;
        $data->meta_description =  $request->meta_description;
        $data->meta_keyword =  $request->meta_keyword;
        $data->meta_image =  $request->meta_image;
        $data->slug_en = $slug_en;
        $data->title_en = $request->title_en;
        $data->summary_en = $request->summary_en;
        $data->detail_en = $request->detail_en;
        $data->image_en = $request->image_en;
        if ($request->meta_url_en == null) {
            $data->meta_url_en = Str::slug($request->title_en, $separator = '-');
        } else {
            $data->meta_url_en = $request->meta_url_en;
        }
        $data->meta_title_en = $request->meta_title_en;
        $data->meta_description_en = $request->meta_description_en;
        $data->meta_keyword_en = $request->meta_keyword_en;
        $data->meta_image_en = $request->meta_image_en;
        $data->status = 1;
        $data->id_user = Auth::user()->id;
        $result = $data->save();
        if ($result == 1) {
            toast("Bạn sửa thành công $data->name", 'success', 'top-right');
            return redirect()->route('music.index');
        }
    }
}
