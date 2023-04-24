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
                            <th width="30%">STT</th>
                            <th width="40%">Tên</th>
                            <th width="30%">Action</th>
                        </tr>
                    </thead>
                    @foreach ($cs as $key => $zone)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $zone->name }}</td>
                            <td>
                                <form method="post" action="">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                    class="btn btn-sm btn-primary">Xóa</button>
                                    <a href="" class="btn btn-sm btn-primary">Sửa</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            {{-- <p>{{ $zones->onEachSide(10)->links() }}</p> --}}
        </div>
    </div>
@endsection
