@extends('admin.layouts.master')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Hình Ảnh</th>
                        <th scope="col">Link Bài Viết</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $key => $slider )                        
                    @endforeach
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $slider->name }}</td>
                        {{-- <td>
                            <img src="{{ asset('public/uploads/' . $product->image) }}" alt="">
                        </td> --}}
                        <td>
                            {{ $slider->image }}
                        </td>
                        <td>{{ $slider->link }}</td>
                        <td>{{ $slider->type }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="">Sửa</a>
                            <a class="btn btn-sm btn-primary" href="">Xóa</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection