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
                            <th width="10%">STT</th>
                            <th width="40%">Tên Tiếng Việt</th>
                            <th width="40%">Tên Tiếng Anh</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    @foreach ($data as $key => $d)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->name_en }}</td>
                            <td>
                                <form method="post" action="{{ route('category.deletecate',$d->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                    class="btn btn-sm btn-primary">Xóa</button>
                                    <a href="{{ route('category.formupdatecate',$d->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $data->onEachSide(10)->links() }}
    </div>
@endsection
