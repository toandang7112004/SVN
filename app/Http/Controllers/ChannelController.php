<?php

namespace App\Http\Controllers;

use App\Http\Requests\Channel\StoreChannelRequest;
use App\Http\Requests\Channel\UpdateChannelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class ChannelController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',[Article::class, 'Channel']);
        $categoryName = 'Channel';
        $results =  DB::table('article')
        ->select('id','title','meta_description','meta_keyword')
        ->whereIn('id_category', function($query) use($categoryName){
            $query->select('id')->from('category')->where('name', $categoryName);
        })
        ->paginate(10);
        return view('admin.channel.index',compact('results'));
    }
    public function create(){
        $this->authorize('create',[Article::class, 'Channel']);
        $cate = Category::where('id', '=', '16')->get();
        return view('admin.channel.create',compact('cate'));
    }
    public function store(StoreChannelRequest $request){
        $data = new Article();
        $slug_vi = Str::slug($request->title, $separator = '-');
        $slug_en = Str::slug($request->title_en, $separator = '-');
        $check_vi = $data::where('slug', '=', $slug_vi)->get();
        if (count($check_vi) == 1) {
            $slug_vi = $slug_vi . "-" . time();
        }
        $data->slug = $slug_vi;
        $data->slug_en = $slug_en;
        $data->title = $request->title;
        $get_image = $request->file('image');
        $get_name_image = $get_image->getClientOriginalName();
        $path = 'public/uploads/';
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $data->image = $new_image;
        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;
        $data->id_category = $request->id_category;
        $data->status = 1;
        $data->id_user = Auth::user()->id;
        $result = $data->save();
        if ($result == 1) {
            toast("Bạn thêm thành công $data->name", 'success', 'top-right');
            return redirect()->route('channel.index');
        }
    }
    public function edit( $id ){
        $this->authorize('update',[Article::class, 'Channel']);
        $channel = Article::find($id);
        $cate = Category::where('id', '=', '16')->get();
        return view('admin.channel.edit',compact('channel','cate'));
    }
    public function update( $id , UpdateChannelRequest $request){
        $data = Article::find($id);
        $slug_vi = Str::slug($request->title, $separator = '-');
        $slug_en = Str::slug($request->title_en, $separator = '-');
        $check_vi = $data::where('slug', '=', $slug_vi)->get();
        if (count($check_vi) == 1) {
            $slug_vi = $slug_vi . "-" . time();
        }
        $data->slug = $slug_vi;
        $data->slug_en = $slug_en;
        $data->title = $request->title;

        if ( $request->file('image') ) {
            $get_image = $request->file('image');
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'public/uploads/';
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $data->image = $new_image;
        }else{
            $data->image = null;
        }

        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;
        $data->id_category = $request->id_category;
        $data->status = 1;
        $data->id_user = Auth::user()->id;
        $result = $data->save();
        if ($result == 1) {
            toast("Bạn sửa thành công $data->name", 'success', 'top-right');
            return redirect()->route('channel.index');
        }
    }
    public function delete( $id ){
        $this->authorize('delete',[Article::class, 'Channel']);
        $channel = Article::find($id)->delete();
        return redirect()->route('channel.index');
    }
}
