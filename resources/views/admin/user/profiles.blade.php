@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <section class="panel">
                <header class="panel-heading">
                    <h4>Thông tin cá nhân</h4>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="{{ route('admin.update.profiles',Auth::user()->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="name" class="col-lg-2 col-sm-2 control-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="position" class="col-lg-2 col-sm-2 control-label">Chức vụ</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="{{ $user->position }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="image" class="col-lg-2 col-sm-2 control-label">Avatar</label>
                                <input readonly type="text" name="avatar" class="form-control" id="image"
                                    value="{{ $user->avatar }}">
                                <input type="button" formtarget="image" class="btn-file" value="Duyệt tìm" />
                                <input type="button" formtarget="image" class="btn-view" value="Xem trước" />
                            </div>
                        </div>
                        <hr>
                       
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="phone" class="col-lg-2 col-sm-2 control-label">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    value="{{ $user->phone }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="address" class="col-lg-2 col-sm-2 control-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $user->address }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="email" class="col-lg-2 col-sm-2 control-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-lg-offset-10 col-lg-10">
                                <button type="submit" class="btn btn-danger">Xác nhận</button>
                            </div>
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </div>
@endsection
