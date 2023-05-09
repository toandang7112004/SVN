<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- modal add --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Details</label>
                        <input type="file" id="detail" name="detail" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                <button type="button" class="btn btn-primary" data-id="17" id="btnSaveadd">Lưu</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Bạn có chắc chắn muốn xóa!</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                <button type="button" id="btnDelete" class="btn btn-primary">Đồng ý</button>
            </div>
        </div>
    </div>
</div>
{{-- modal edit --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Details</label>
                        <input type="file" id="detail" name="detail" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                <button type="button" class="btn btn-primary" data-id="17" id="btnSaveedit">Lưu</button>
            </div>
        </div>
    </div>
</div>
<style>

</style>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        @include('admin.includes.sidebar')

        <div class="content">
            @include('admin.includes.header')
            {{-- @include('admin.includes.dashboard') --}}
            @yield('content')
            @include('admin.includes.footer')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @yield('js')

    @yield('css')


</body>

</html>
<SCRIPT>
    //danh sách
    $(document).on('click', '.list_hotel', function(e) {
        getlist();
    })

    function getlist() {
        $.ajax({
            url: 'http://127.0.0.1:8000/hotel_info/index/',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                let html = '';
                console.log(response);
                html += '<div class="container-fluid pt-4 px-4">';
                html += '<div class="bg-secondary text-center rounded p-4">';
                html += '<div class="d-flex align-items-center justify-content-between mb-4">';
                html += '<a href="">Show All</a>';
                html += '<div class="d-none d-md-flex ms-4">';
                html +=
                    '<input class="form-control bg-dark border-0 input-search-ajax" type="text" placeholder="Search">';
                html += '</div>';
                html += '</div>';
                html += '<div class="table-responsive ">';
                html +=
                    '<table class="table text-start align-middle table-bordered table-hover mb-0 ">';
                html += '<thead>';
                html += ' <tr>';
                html += '<th width="30%">STT</th>';
                html += '<th width="40%">Tên</th>';
                html += '<th width="30%">Action</th>';
                html += '</tr>';
                html += '</thead>';
                html += '</tbody class="tbody_123">';
                $.each(response, function(key, value) {
                    html += '<tr class="">';
                    html += '<td>' + value.id + '</td>';
                    html += '<td>' + value.title + '</td>';
                    html += '<td>';
                    html += '<button class="btn btn-danger edit-btn" data-id="' + value
                        .id +
                        '">Edit</button>';
                    html += '  <button class="btn btn-danger delete-btn" data-id="' +
                        value
                        .id + '">Delete</button>';
                    html += '</td>';
                    html += '</tr>';
                })
                html += '</tbody>';
                html += '</table>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                $('.content').html(html);
            }
        })
    }
    //tìm kiếm
    var typingTimer;
    var doneTypingInterval = 700;
    $(document).on("keyup", ".input-search-ajax", function(event) {
        event.preventDefault();
        clearTimeout(typingTimer);
        var text = $(this).val();
        typingTimer = setTimeout(function() {
            $.ajax({
                url: "http://127.0.0.1:8000/hotel_info/search?key=" + text,
                method: 'get',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    let html = '';
                    html += '<div class="container-fluid pt-4 px-4">';
                    html += '<div class="bg-secondary text-center rounded p-4">';
                    html +=
                        '<div class="d-flex align-items-center justify-content-between mb-4">';
                    html += '<a href="">Show All</a>';
                    html += '<div class="d-none d-md-flex ms-4">';
                    html +=
                        '<input class="form-control bg-dark border-0 input-search-ajax" type="text" placeholder="Search">';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="table-responsive ">';
                    html +=
                        '<table class="table text-start align-middle table-bordered table-hover mb-0 ">';
                    html += '<thead>';
                    html += ' <tr>';
                    html += '<th width="30%">STT</th>';
                    html += '<th width="40%">Tên</th>';
                    html += '<th width="30%">Action</th>';
                    html += '</tr>';
                    html += '</thead>';
                    html += '</tbody class="tbody_123">';
                    $.each(response, function(key, value) {
                        html += '<tr class="">';
                        html += '<td>' + value.id + '</td>';
                        html += '<td>' + value.title + '</td>';
                        html += '<td>';
                        html +=
                            '<button class="btn btn-danger edit-btn" data-id="' +
                            value
                            .id +
                            '">Edit</button>';
                        html +=
                            '  <button class="btn btn-danger delete-btn" data-id="' +
                            value
                            .id + '">Delete</button>';
                        html += '</td>';
                        html += '</tr>';
                    })
                    html += '</tbody>';
                    html += '</table>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    $('.content').html(html);
                }
            })
        }, doneTypingInterval);
    });
    //xóa
    $(document).on('click', '.delete-btn', function(e) {
        var id = $(this).attr('data-id');
        delete_hotel(id);
    })

    function delete_hotel(id) {
        $('#deleteModal').modal('show');
        console.log(id);
        $('#btnDelete').off('click').one('click', function() {
            $.ajax({
                url: '/hotel_info/delete/' + id,
                method: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#deleteModal').modal('hide');
                    getlist();
                }
            });
        });
    }
    //thêm
    $(document).on('click', '.add_hotel', function(e) {
        $('#addModal').modal('show');
    })
    $('#btnSaveadd').on('click', function() {
        var form = new FormData($('#add')[0]);
        var formData = $(this).serialize();
        console.log(formData);
        let options = {
            url: 'http://127.0.0.1:8000/hotel_info/store',
            method: 'post',
            data: form,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                $('#addModal').modal('hide');
                getlist();
                $('#add')[0].reset();
            },
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            }
        });
        $.ajax(options);
    })
    // sửa
    $(document).on('click', '.edit-btn', function(e) {
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'http://127.0.0.1:8000/hotel_info/edit/' + id,
            method: 'get',
            success: function(response) {
                console.log(response);
                $('#title').val(response.title);
                $('#image').text(response.image);
                $('#detail').text(response.detail);
                $('#editModal').modal('show');
            }
        });
        $('#btnSaveedit').on('click', function() {
            var form = new FormData($('#edit')[0]);
            form.append('title', $('#title').val());
            form.append('image', $('#image').val());
            form.append('detail', $('#detail').val());
            let options = {
                url: 'http://127.0.0.1:8000/hotel_info/update/' + id,
                method: 'post',
                data: form,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#editModal').modal('hide');
                    getlist();
                }
            }
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                }
            });

            $.ajax(options);
        });
    });
</SCRIPT>
