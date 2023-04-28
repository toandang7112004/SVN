@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <section class="panel">
                <header class="panel-heading">
                    <b>Thêm Bài Viết</b><br>
                </header>
                <div class="panel-body">
                    <section class="panel">
                        <header class="panel-heading tab-bg-dark-navy-blue ">
                            <ul class="nav nav-tabs">
                                <li class="">
                                    <a data-toggle="tab" href="#about"><b>Thông Tin</b></a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" id="Category" method="post"
                                action="{{ route('menu.update', [$menu->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="tab-content">
                                    <div id="home" class="tab-pane">
                                        <hr>
                                        <div class="form-group">
                                            <label for="parent_id" class="col-lg-2 col-sm-2 control-label">Danh Mục</label>
                                            <div class="col-lg-12">
                                                <select class="form-control" name="id_category">
                                                    @if (isset($cate))
                                                        @foreach ($cate as $c)
                                                            @if ($c->id == 8)
                                                                <option selected value="{{ $c->id }}">
                                                                    {{ $c->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="about" class="tab-pane active">
                                        <div class="form-group">
                                            <label for="name" class="col-lg-2 col-sm-2 control-label">Tên Dịch
                                                Vụ</label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" id="title" name="title"
                                                    value="{{ $menu->title }}">
                                            </div>
                                            @error('title')
                                                <div class="text text-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-lg-2 col-sm-2 control-label"> Image </label>
                                        <div class="col-lg-12">
                                            <input readonly type="file" name="image" class="form-control"
                                                id="image" value="{{ $menu->image }}">
                                            <img src="{{ asset('public/uploads/' . $menu->image) }}" width="100px"
                                                height="100px" alt="">
                                        </div>
                                        @error('image')
                                                <div class="text text-danger ">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <br>
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
