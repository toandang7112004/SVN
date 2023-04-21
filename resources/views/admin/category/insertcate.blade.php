@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
    <section class="panel">
        <header class="panel-heading">
            <b>Thêm Category</b><br>
        </header>
        <div class="panel-body">
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#home"><b>Cấu Hình Chung</b></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#about"><b>Thông tin tiếng việt</b></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#profile"><b>Thông tin tiếng anh</b></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#seoviet"><b>Meta SEO tiếng việt</b></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#seoeng"><b>Meta SEO tiếng anh</b></a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal"  method="post" action="{{ asset(route('admin-category-insert')) }}">
                        <div class="tab-content">
                            <div id="home" class="tab-pane active">
                                <div class="form-group">
                                    <label for="status" class="col-lg-2 col-sm-2 control-label">Hiển thị</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="status">
                                            <option value="1">Có</option>
                                            <option value="0">Không</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="parent_id" class="col-lg-2 col-sm-2 control-label">Lớp Cha</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="parent_id">
                                            <option value="1">ROOT</option>
                                            @if (isset($cate))
                                                @foreach ($cate as $c)
                                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="about" class="tab-pane">
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 col-sm-2 control-label">Tên</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="summary" class="col-lg-2 col-sm-2 control-label">Mô tả ngắn</label>
                                    <div class="col-lg-10">
                                        <textarea style="height: 200px" class="form-control" name="summary"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="detail" class="col-lg-2 col-sm-2 control-label">Thông tin chi tiết</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control ckeditor" name="detail"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="image" class="col-lg-2 col-sm-2 control-label">Ảnh</label>
                                    <div class="col-lg-10">
                                        <input readonly type="text" name="image" class="form-control" id="image"
                                            value="">
                                        <input type="button" formtarget="image" class="btn-file" value="Duyệt tìm" />
                                        <input type="button" formtarget="image" class="btn-view" value="Xem trước" />
                                    </div>
                                </div>

                                <hr>
                            </div>
                            <div id="profile" class="tab-pane">
                                <div class="form-group">
                                    <label for="name_en" class="col-lg-2 col-sm-2 control-label">Tên</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="name_en" name="name_en"
                                            value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="summary_en" class="col-lg-2 col-sm-2 control-label">Mô tả ngắn</label>
                                    <div class="col-lg-10">
                                        <textarea style="height: 200px" class="form-control" name="summary_en"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="detail_en" class="col-lg-2 col-sm-2 control-label">Thông tin chi
                                        tiết</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control ckeditor" name="detail_en"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="image_en" class="col-lg-2 col-sm-2 control-label">Ảnh</label>
                                    <div class="col-lg-10">
                                        <input readonly type="text" name="image_en" class="form-control"
                                            id="image_en" value="">
                                        <input type="button" formtarget="image_en" class="btn-file"
                                            value="Duyệt tìm" />
                                        <input type="button" formtarget="image_en" class="btn-view"
                                            value="Xem trước" />
                                    </div>
                                </div>

                                <hr>
                            </div>
                            <div id="seoviet" class="tab-pane">
                                <div class="form-group">
                                    <label for="meta_title" class="col-lg-2 col-sm-2 control-label">Meta Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="meta_description" class="col-lg-2 col-sm-2 control-label">Meta
                                        description</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="meta_description"
                                            name="meta_description" value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="meta_keyword" class="col-lg-2 col-sm-2 control-label">Meta keyword</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                            value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="meta_url" class="col-lg-2 col-sm-2 control-label">Meta URL</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="meta_url" name="meta_url"
                                            value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="meta_image" class="col-lg-2 col-sm-2 control-label">Meta Image</label>
                                    <div class="col-lg-10">
                                        <input readonly type="text" name="meta_image" class="form-control"
                                            id="meta_image" value="">
                                        <input type="button" formtarget="meta_image" class="btn-file"
                                            value="Duyệt tìm" />
                                        <input type="button" formtarget="meta_image" class="btn-view"
                                            value="Xem trước" />
                                    </div>
                                </div>
                            </div>
                            <div id="seoeng" class="tab-pane">
                                <div class="form-group">
                                    <label for="meta_title_en" class="col-lg-2 col-sm-2 control-label">Meta Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="meta_title_en"
                                            name="meta_title_en" value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="meta_description_en" class="col-lg-2 col-sm-2 control-label">Meta
                                        description</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="meta_description_en"
                                            name="meta_description_en" value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="meta_keyword_en" class="col-lg-2 col-sm-2 control-label">Meta
                                        keyword</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="meta_keyword_en"
                                            name="meta_keyword_en" value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="meta_url_en" class="col-lg-2 col-sm-2 control-label">Meta URL</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="meta_url_en" name="meta_url_en"
                                            value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="meta_image_en" class="col-lg-2 col-sm-2 control-label">Meta Image</label>
                                    <div class="col-lg-10">
                                        <input readonly type="text" name="meta_image_en" class="form-control"
                                            id="meta_image_en" value="">
                                        <input type="button" formtarget="meta_image_en" class="btn-file"
                                            value="Duyệt tìm" />
                                        <input type="button" formtarget="meta_image_en" class="btn-view"
                                            value="Xem trước" />
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <div class="form-group">
                                <div class="col-lg-offset-6 col-lg-6">
                                    <button class="btn btn-danger" type="submit">Xác Nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </section>

@endsection