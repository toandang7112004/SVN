<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index(){
        $this->authorize('viewAny',[Article::class, 'Group']);
        $groups = Group::all();
        return view('admin.group.index',compact('groups'));
    }
    public function create(){
        $this->authorize('create',[Article::class, 'Group']);
        return view('admin.group.create');
    }
    public function store( StoreGroupRequest $request ){
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
        $this->authorize('update',[Article::class, 'Group']);
        $group = Group::find($id);
        return view('admin.group.edit',compact('group'));
    }
    public function update( UpdateGroupRequest $request , $id ){
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
        $this->authorize('delete',[Article::class, 'Group']);
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
    public function detail( $id ){
        $group = Group::find($id);
        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        $roles = Role::all()->toArray();
        $group_names = [];

        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.group.detail',$params);
    }
    public function update_position( Request $request ,$id ){
        $group = Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
        return redirect()->route('group.index');
    }
}
