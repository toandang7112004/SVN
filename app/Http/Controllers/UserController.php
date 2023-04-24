<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\Zone;
use Dotenv\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $zones = Zone::where('status', '=', '1')->where('id', '!=', '1')->get();
        return view('admin.includes.dashboard',compact('zones'));
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
    public function form_change_password($id)
    {
    }
}
