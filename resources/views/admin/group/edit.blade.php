@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <section class="panel">
                <div class="panel-body">
                    <section class="panel">
                        <header class="panel-heading tab-bg-dark-navy-blue ">
                            <ul class="nav nav-tabs">
                                <li class="">
                                    <a data-toggle="tab" href="#about"><b>Sửa chức vụ</b></a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" id="Category" method="post" action="{{ route('group.update',[$group->id]) }}">
                                @method('PUT')
                                @csrf
                                <div class="tab-content">
                                    <div id="about" class="tab-pane active">
                                        <div class="form-group">
                                            <label for="name" class="col-lg-2 col-sm-2 control-label">Tên quyền</label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $group->name }}">
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-12 col-lg-12">
                                            <button class="btn btn-danger" type="submit">Xác Nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </section>
                </div>
            </section>
        </div>
    </div>
@endsection
