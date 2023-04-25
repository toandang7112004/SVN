@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Salse</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="20%">STT</th>
                            <th width="20%">Tên</th>
                            <th width="20%">Thể loại</th>
                            <th width="20%">Ảnh</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    @foreach ($results as $key => $result)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $result->title }}</td>
                            <td>{{ $result->name }}</td>
                            @if ( isset($result->image) )
                            <td>
                                <img src="{{ asset('public/uploads/' . $result->image) }}" width="100px" height="100px" alt="">
                            </td>
                            @else
                                <td></td>
                            @endif
                            
                            <td>
                                <form method="post" action="{{ route('music.delete',[$result->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('music.edit',[$result->id]) }}" class="btn btn-sm btn-primary">Sửa</a>
                                    <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                    class="btn btn-sm btn-primary">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <p>{{ $results->onEachSide(10)->links() }}</p>
        </div>
    </div>
@endsection
