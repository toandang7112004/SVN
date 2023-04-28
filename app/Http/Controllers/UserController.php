<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\Group;
use App\Models\Zone;
use Dotenv\Validator;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $zones = Zone::where('status', '=', '1')->where('id', '!=', '1')->get();
            return view('admin.includes.dashboard',compact('zones'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function profiles($id)
    {
        $user = User::find($id);
        return view('admin.user.profiles', compact('user'));
    }
    public function updateprofiles($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->position = $request->position;
        $user->avatar = $request->avatar;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        if ($user->save()) {
            toast('Sửa Thông tin Thành Công!', 'success', 'top-right');
            return view('admin.includes.dashboard');
        }
    }
    public function formlogin()
    {
        return view('admin.login');
    }
    public function login(LoginRequest  $request)
    {
        $data = $request->only('username', 'password');
        if (Auth::attempt($data)) {
            toast('Đăng Nhập Thành Công!', 'success', 'top-right');
            return redirect()->route('admin.index');
        } else {
            toast('Sai mật khẩu hoặc tài khoản!', 'error', 'top-right');
            return redirect()->route('admin.login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function form_change_password($id)
    {
        $user = User::find($id);
        return view('admin.user.changepassword',compact('user'));
    }
    public function post_form_change_password( $id , Request $request ){
        
    }
    public function list(){
        $this->authorize('viewAny',[Article::class, 'User']);
        $users = User::paginate(10);
        return view('admin.user.list',compact('users'));
    }
    public function create(){
        $this->authorize('create',[Article::class, 'User']);
        $groups = Group::all();
        return view('admin.user.create',compact('groups'));
    }
    public function store( Request $request ){
        $repeat = 0 ;
        $users = User::all();
        foreach($users as $user){
            if( $user->username == $request->username || $user->email == $request->email){
                $repeat = 1 ;
            }
        }
        if( $repeat == 0 ){
            $user = new User();
            $user->username = $request->username;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->group_id = $request->group_id;
            if ($request->password == $request->confirm_password ) {
                $user->password = Hash::make($request->password);
                $user->save();
                toast("đăng kí tài khoản thành công", 'success', 'top-right');
                return redirect()->route('user.list');
            }else{
                toast("Xác thực mật khẩu không đúng", 'error', 'top-right');
                return redirect()->route('user.create');
            }
        }else{
            toast("Tên đăng nhập hoặc email bị trùng", 'error', 'top-right');
            return redirect()->route('user.create');
        }
    }
    public function edit( $id ){
        $this->authorize('update',[Article::class, 'User']);
        $users = User::find($id);
        return view('admin.user.edit',compact('users'));
    }
    public function delete( $id ){
        $this->authorize('delete',[Article::class, 'User']);
        $users = User::find($id)->delete();
        toast("Xóa người dùng thành công", 'success', 'top-right');
        return redirect()->route('user.list');
    }
}
