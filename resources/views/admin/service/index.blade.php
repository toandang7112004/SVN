@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <a href="">Show All</a>
                    <form class="d-none d-md-flex ms-4">
                        <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                    </form>
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
                        @foreach ($results as $key => $result)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $result->title }}</td>
                                <td>
                                    <form method="post" action="{{ route('service.delete', [$result->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        @if (Auth::user()->hasPermission('service_delete'))
                                            <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                                class="btn btn-sm btn-primary">Xóa</button>
                                        @endif
                                        @if (Auth::user()->hasPermission('service_update'))
                                            <a href="{{ route('service.edit', [$result->id]) }}"
                                                class="btn btn-sm btn-primary">Sửa</a>
                                        @endif
                                    </form>
                                </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <p>{{ $results->onEachSide(10)->links() }}</p>
            </div>
        </div>
@endsection
