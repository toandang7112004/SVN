<?php

namespace App\Http\Controllers;

use App\Http\Requests\service\StoreServiceRequest;
use App\Http\Requests\service\UpdateServiceRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ServiceController extends Controller
{
    public function index(){
        $this->authorize('viewAny',[Article::class, 'Service']);
        $categoryName = 'Service';
        $results =  DB::table('article')
        ->select('id','title')
        ->whereIn('id_category', function($query) use($categoryName){
            $query->select('id')->from('category')->where('name', $categoryName);
        })
        ->paginate(10);
        return view('admin.service.index',compact('results'));
    }
    public function create(){
        $this->authorize('create',[Article::class, 'Service']);
        $cate = Category::where('id', '=', '10')->get();
        return view('admin.service.create',compact('cate'));
    }
    public function store( StoreServiceRequest $request ){
        $data = new Article();
        $slug_vi = Str::slug($request->title, $separator = '-');
        $check_vi = $data::where('slug', '=', $slug_vi)->get();
        $data->slug = $slug_vi;
        $data->title = $request->title;

        if ($request->file('detail')) {
            $get_image1 = $request->file('detail');
            $get_name_image1 = $get_image1->getClientOriginalName();
            $path1 = 'public/uploads/';
            $name_image1 = current(explode('.', $get_name_image1));
            $new_image1 = $name_image1 . '.' . $get_image1->getClientOriginalExtension();
            $get_image1->move($path1, $new_image1);
            $data->detail = $new_image1;
        } else {
            $data->image = null;
        }

        if ($request->file('image')) {
            $get_image = $request->file('image');
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'public/uploads/';
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $data->image = $new_image;
        } else {
            $data->image = null;
        }
        $data->id_category = $request->id_category;
        $data->status = 1;
        $data->id_user = Auth::user()->id;
        $result = $data->save();
        if ($result == 1) {
            toast("Bạn thêm thành công $data->name", 'success', 'top-right');
            return redirect()->route('service.index');
        }
    }
    public function edit( $id ){
        $this->authorize('update',[Article::class, 'Service']);
        $services = Article::find($id);
        $cate = Category::where('id', '=', '10')->get();
        return view('admin.service.edit', compact('services','cate'));
    }
    public function update( $id , UpdateServiceRequest $request){
        $data = Article::find($id);
        $slug_vi = Str::slug($request->title, $separator = '-');
        $check_vi = $data::where('slug', '=', $slug_vi)->get();
        $data->slug = $slug_vi;
        $data->title = $request->title;

        if ($request->file('detail')) {
            $get_image1 = $request->file('detail');
            $get_name_image1 = $get_image1->getClientOriginalName();
            $path1 = 'public/uploads/';
            $name_image1 = current(explode('.', $get_name_image1));
            $new_image1 = $name_image1 . '.' . $get_image1->getClientOriginalExtension();
            $get_image1->move($path1, $new_image1);
            $data->detail = $new_image1;
        } else {
            $data->image = null;
        }

        if ($request->file('image')) {
            $get_image = $request->file('image');
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'public/uploads/';
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $data->image = $new_image;
        } else {
            $data->image = null;
        }
        $data->id_category = $request->id_category;
        $data->status = 1;
        $data->id_user = Auth::user()->id;
        $result = $data->save();
        if ($result == 1) {
            toast("Bạn sửa thành công $data->name", 'success', 'top-right');
            return redirect()->route('service.index');
        }
    }
    public function delete($id){
        $this->authorize('delete',[Article::class, 'Service']);
        $services = Article::find($id)->delete();
        return redirect()->route('service.index');
    }
}
