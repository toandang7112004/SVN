@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <a href="">Chi tiết chức vụ</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="20%">STT</th>
                            <th width="30%">Chức vụ</th>
                            <th width="20%">Hiện có</th>
                            <th width="30%">Action</th>
                        </tr>
                    </thead>
                    @foreach ($groups as $key => $group)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $group->name }}</td>
                            <td>{{ count($group->users) }} người</td>
                            <td>
                                <form method="post" action="{{ route('group.delete',[$group->id]) }}">
                                    <a href="" class="btn btn-sm btn-primary">Trao quyền</a>
                                    <a href="{{ route('group.edit',[$group->id]) }}" class="btn btn-sm btn-primary">Sửa</a>
                                    @method('DELETE')
                                    @csrf
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
        </div>
    </div>
@endsection
