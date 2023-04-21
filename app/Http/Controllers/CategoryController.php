<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function index()
    {
        $data = Category::paginate(10);
        return view('admin.category.index', compact('data'));
    }
    function forminsertcate()
    {
        return view('admin.category.insertcate');
    }
    function insertcate(Request $request)
    {
        $this->garena();
        $cate = new Category();
        $cat = $cate->getList();
        $layout = Category::find($request->parent_id);
        $slug_vi = Str::slug($request->name, $separator = '-');
        $slug_en = Str::slug($request->name_en, $separator = '-');
        $check_vi = $cate::where('slug', '=', $slug_vi)->get();
        $check_en = $cate::where('slug_en', '=', $slug_en)->get();
        if (count($check_vi) == 1) {
            $slug_vi = $slug_vi . "-" . time();
        }
        if (count($check_en) == 1) {
            $slug_en = $slug_en . "-" . time();
        }
        $cate->slug = $slug_vi;
        $cate->name = $request->name;
        $cate->summary = $request->summary;
        $cate->detail =  $request->detail;
        $cate->image = $request->image;
        $cate->parent_id = $request->parent_id;
        if ($request->meta_url == null) {
            $cate->meta_url = Str::slug($request->name, $separator = '-');
        } else {
            $cate->meta_url = $request->meta_url;
        }
        $cate->meta_title =  $request->meta_title;
        $cate->meta_description = $request->meta_description;
        $cate->meta_keyword = $request->meta_keyword;
        $cate->meta_image = $request->meta_image;

        $cate->slug_en = $slug_en;
        $cate->name_en = $request->name_en;
        $cate->summary_en = $request->summary_en;
        $cate->detail_en = $request->detail_en;
        $cate->image_en = $request->image_en;
        if ($request->meta_url_en == null) {
            $cate->meta_url_en = Str::slug($request->name_en, $separator = '-');
        } else {
            $cate->meta_url_en = $request->meta_url_en;
        }
        $cate->meta_title_en = $request->meta_title_en;
        $cate->meta_description_en = $request->meta_description_en;
        $cate->meta_keyword_en = $request->meta_keyword_en;
        $cate->meta_image_en = $request->meta_image_en;
        $cate->status = $request->status;
        $cate->id_user = $request->id_user;
        $cate->layout = $layout->layout;
        $result = $cate->save();
        if ($result == 1) {
            toast('Thêm thành thành công', 'success', 'top-right');
            return redirect()->route('category.insertcate');
        }
        return view('admin.category.insertcate');
    }
    function activecategory(Request $request)
    {
        if (Request::ajax()) {
            $data = $request->all();
            $category = Category::find($data['id']);
            $session = Session::token();
            if ($category->status == 1) {
                $category->status = 0;
                $co = 0;
            } else {
                $category->status = 1;
                $co = 1;
            }
            $result = $category->save();
            if ($result == 1) {
                if ($co == 1)
                    $o =  "<a class='ban-users' id='$category->id' style='margin-right: 5px'><i class='icon-eye-open'></i></a>
                       <input type='hidden' name='_token' id='csrf-token' value='$session'/>";
                else
                    $o =  "<a class='ban-users' id='$category->id' style='margin-right: 5px'><i class='icon-eye-close'></i></a>
                       <input type='hidden' name='_token' id='csrf-token' value='$session'/>";
                echo json_encode($o);
            }
        }
    }
    function formupdatecate($id)
    {
        $data = Category::find($id);
        return view('admin.category.update', compact('data'));
    }
    function updatecate($id, Request $request)
    {
        $cat = Category::all();
        $layout = Category::find($request->parent_id);
        $data = Category::find($id);
        $data->name = $request->name;
        $data->summary = $request->summary;
        $data->detail = $request->detail;
        $data->image = $request->image;
        $data->parent_id = $request->parent_id;
        if ($request->meta_url == null) {
            $data->meta_url = Str::slug($request->name, $separator = '-');
        } else {
            $data->meta_url = $request->meta_url;
        }
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_image = $request->meta_image;
        $data->name_en = $request->name_en;
        $data->summary_en = $request->summary_en;
        $data->detail_en = $request->detail_en;
        $data->image_en = $request->image_en;
        if ($request->meta_url_en == null) {
            $data->meta_url_en = Str::slug($request->name_en, $separator = '-');
        } else {
            $data->meta_url_en = $request->meta_url_en;
        }
        $data->meta_title_en = $request->meta_title_en;
        $data->meta_description_en = $request->meta_description_en;
        $data->meta_keyword_en = $request->meta_keyword_en;
        $data->meta_image_en = $request->meta_image_en;
        $data->status = $request->status;
        $data->id_user =  $request->id_user;
        if ($layout->id != 1) {
            $data->layout = $layout->layout;
        }
        $result = $data->save();
        if ($result == 1) {
            toast("Bạn cập nhật thành công category tên là $data->name", 'success', 'top-right');
            return redirect()->route('category.index');
        }
        return view('admin.category.update', compact('data'));
    }
    function deletecate($id)
    {
        $data = Category::find($id)->delete();
        if ($data == 1) {
            toast("Xóa thành công Category có id là $id", 'success', 'top-right');
            return redirect()->route('category.index');
        }
    }
}
