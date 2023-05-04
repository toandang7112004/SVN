@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="">
                            <a data-toggle="tab" href="#about"><b>Thêm người dùng</b></a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post"
                        action="{{ route('user.store') }}">
                        @csrf
                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-2">Tên đăng nhập</label>
                            <div class="col-lg-12">
                                <input class="form-control " id="username" name="username" type="text" />
                            </div>
                            @error('username')
                                <div class="text text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="password">Mật khẩu </label>
                            <div class="col-lg-12">
                                <input class="form-control " id="password" name="password" type="password" />
                            </div>
                            @error('password')
                                <div class="text text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="confirm_password" class="control-label col-lg-2">Nhập lại mật khẩu</label>
                            <div class="col-lg-12">
                                <input class="form-control " id="confirm_password" name="confirm_password"
                                    type="password" />
                            </div>
                            @error('confirm_password')
                                <div class="text text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-lg-2 col-sm-2 control-label">Tên</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            @error('name')
                                <div class="text text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-lg-2 col-sm-2 control-label">Phone</label>
                            <div class="col-lg-12">
                                <input type="number" class="form-control" id="phone" name="phone">
                            </div>
                            @error('phone')
                                <div class="text text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-2 col-sm-2 control-label">Email</label>
                            <div class="col-lg-12">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            @error('email')
                                <div class="text text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-2 col-sm-2 control-label">Bộ phận</label>
                            <div class="col-lg-12">
                                <select name="group_id" id="" class="form-control">
                                    <option value="">--Vui lòng chọn--</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">
                                            {{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('group_id')
                                <div class="text text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-lg-offset-12 col-lg-12">
                                <button type="submit" class="btn btn-danger">Xác nhận</button>
                            </div>
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </div>
@endsection
