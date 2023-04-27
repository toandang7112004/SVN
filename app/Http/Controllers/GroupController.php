<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
class GroupController extends Controller
{
    public function index(){
        $groups = Group::all();
        return view('admin.group.index',compact('groups'));
    }
    public function create(){
        return view('admin.group.create');
    }
    public function store( Request $request ){
        $group = new Group();
        $group->name = $request->name;
        try {
            $group->save();
            toast("Bạn thêm quyền thành công ", 'success', 'top-right');
            return redirect()->route('group.index');
        } catch (\exception $e) {
            toast("Bạn thêm quyền thất bại ", 'error', 'top-right');
            return redirect()->route('group.index');
        }
    }
    public function edit( $id ){
        $group = Group::find($id);
        return view('admin.group.edit',compact('group'));
    }
    public function update( Request $request , $id ){
        $group = Group::find($id);
        $group->name = $request->name;
        try {
            $group->save();
            toast("Bạn sửa quyền thành công ", 'success', 'top-right');
            return redirect()->route('group.index');
        } catch (\exception $e) {
            toast("Bạn sửa quyền thất bại ", 'error', 'top-right');
            return redirect()->route('group.index');
        }
    }
    public function delete( $id ){
        $group = Group::find($id);
        try {
            $group->delete();
            toast("Bạn xóa quyền thành công ", 'success', 'top-right');
            return redirect()->route('group.index');
        } catch (\exception $e) {
            toast("Bạn xóa quyền thất bại ", 'error', 'top-right');
            return redirect()->route('group.index');
        }
    }
}
