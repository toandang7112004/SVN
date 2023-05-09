@extends('admin.layouts.master')
@section('content')
    <section class="panel">
        <div class="panel-body">
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#home"><b>Cấu Hình Chung</b></a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal" id="Configs" method="post">
                        <div class="tab-content">
                            <div id="home" class="tab-pane active">
                                <div class="form-group">
                                    <label for="background_index" class="col-lg-2 col-sm-2 control-label">Background Index
                                    </label>
                                    <div class="col-lg-12">
                                        <input readonly type="text" name="background_index" class="form-control"
                                            id="background_index" value="{{ $background->background_index }}">
                                        <input type="button" formtarget="background_index" class="btn-file"
                                            value="Duyệt tìm" />
                                        <input type="button" formtarget="background_index" class="btn-view"
                                            value="Xem trước" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="background_activities" class="col-lg-2 col-sm-2 control-label">Background
                                        Activities </label>
                                    <div class="col-lg-12">
                                        <input readonly type="text" name="background_activities" class="form-control"
                                            id="background_activities" value="{{ $background->background_activities }}">
                                        <input type="button" formtarget="background_activities" class="btn-file"
                                            value="Duyệt tìm" />
                                        <input type="button" formtarget="background_activities" class="btn-view"
                                            value="Xem trước" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="background_channel" class="col-lg-2 col-sm-2 control-label">Background
                                        Channel </label>
                                    <div class="col-lg-12">
                                        <input readonly type="text" name="background_channel" class="form-control"
                                            id="background_channel" value="{{ $background->background_channel }}">
                                        <input type="button" formtarget="background_channel" class="btn-file"
                                            value="Duyệt tìm" />
                                        <input type="button" formtarget="background_channel" class="btn-view"
                                            value="Xem trước" />
                                    </div>
                                    <hr>
                                </div>
                                <div class="form-group">
                                    <label for="background_dinner" class="col-lg-2 col-sm-2 control-label">Background Dinner
                                    </label>
                                    <div class="col-lg-12">
                                        <input readonly type="text" name="background_dinner" class="form-control"
                                            id="background_dinner" value="{{ $background->background_dinner }}">
                                        <input type="button" formtarget="background_dinner" class="btn-file"
                                            value="Duyệt tìm" />
                                        <input type="button" formtarget="background_dinner" class="btn-view"
                                            value="Xem trước" />
                                    </div>
                                    <hr>
                                </div>
                                <div class="form-group">
                                    <label for="background_service" class="col-lg-2 col-sm-2 control-label">Background
                                        Service </label>
                                    <div class="col-lg-12">
                                        <input readonly type="text" name="background_service" class="form-control"
                                            id="background_service" value="{{ $background->background_service }}">
                                        <input type="button" formtarget="background_service" class="btn-file"
                                            value="Duyệt tìm" />
                                        <input type="button" formtarget="background_service" class="btn-view"
                                            value="Xem trước" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="background_bill" class="col-lg-2 col-sm-2 control-label">Background Bill
                                    </label>
                                    <div class="col-lg-12">
                                        <input readonly type="text" name="background_bill" class="form-control"
                                            id="background_bill" value="{{ $background->background_bill }}">
                                        <input type="button" formtarget="background_bill" class="btn-file"
                                            value="Duyệt tìm" />
                                        <input type="button" formtarget="background_bill" class="btn-view"
                                            value="Xem trước" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="video_intro" class="col-lg-2 col-sm-2 control-label"> Video Intro </label>
                                    <div class="col-lg-12">
                                        <input readonly type="text" name="video_intro" class="form-control"
                                            id="video_intro" value="{{ $background->video_intro }}">
                                        <input type="button" formtarget="video_intro" class="btn-file"
                                            value="Duyệt tìm" />
                                        <input type="button" formtarget="video_intro" class="btn-view"
                                            value="Xem trước" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group">
                            <div class="col-lg-offset-12 col-lg-12">
                                <button class="btn btn-danger" type="submit">Xác Nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(".btn-file").click(function() {
            var newwd = window.open('{{ URL::asset('/public/media/file/browser.php') }}', 'file_manager',
                'width=1000,height=520');
            newwd.id = $(this).attr("formtarget");
        })
        $(".btn-view").click(function() {
            var newwd = window.open($("#" + $(this).attr("formtarget")).val(), 'file_manager',
                'width=auto,height=auto');
        })
    </script>
    <script>
        function getData(id, data) {
            $("#" + id).val(data);
        }
    </script>
@endsection
