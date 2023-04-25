@extends('admin.layouts.master')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <section class="panel">
          <header class="panel-heading">
              <h4>Đổi Mật Khẩu</h4>
          </header>
          <div class="panel-body">
             <div class="form">
                 <form class="cmxform form-horizontal tasi-form" id="ChangePasswordForm" method="post" action="{{ route('post_form_change_password',$user->id) }}">
                    @csrf
                     <div class="form-group ">
                         <label for="username" class="control-label col-lg-2">Username</label>
                         <div class="col-lg-12">
                             <input class="form-control" id="username" name="username" type="text" value="{{$user->name}}" />
                         </div>
                     </div>
                     <br>
                     <div class="form-group ">
                          <label for="oldpassword" class="control-label col-lg-2">Mật khẩu cũ</label>
                          <div class="col-lg-12">
                              <input class="form-control" id="oldpassword" name="oldpassword" type="password" />
                          </div>
                      </div>
                      <br>
                     <div class="form-group ">
                         <label for="password" class="control-label col-lg-2">Mật khẩu mới</label>
                         <div class="col-lg-12">
                             <input class="form-control " id="password" name="password" type="password" />
                         </div>
                     </div>
                     <br>
                     <div class="form-group ">
                         <label for="confirm_password" class="control-label col-lg-2">Nhập lại mật khẩu</label>
                         <div class="col-lg-12">
                             <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                         </div>
                     </div>
                     <br>
                     <div class="form-group">
                         <div class="col-lg-offset-12 col-lg-12">
                             <button class="btn btn-danger" type="submit">Xác Nhận</button>
                         </div>
                     </div>
                 </form>
             </div>

          </div>
      </section>
    </div>
</div>
@endsection