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
                            <th width="10%">STT</th>
                            <th width="20%">Tên</th>
                            <th width="20%">Email</th>
                            <th width="10%">Phone</th>
                            <th width="10%">Bộ Phận</th>
                            <th width="15%">Tên đăng nhập</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                {{ $user->groups->name }}
                            </td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <form method="post" action="{{ route('user.delete', [$user->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    {{-- @if (Auth::user()->hasPermission('user_update'))
                                        <a href="{{ route('user.edit', [$user->id]) }}"
                                            class="btn btn-sm btn-primary">Sửa</a>
                                    @endif --}}
                                    @if (Auth::user()->hasPermission('user_delete'))
                                        <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                            class="btn btn-sm btn-primary">Xóa</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <p>{{ $users->onEachSide(10)->links() }}</p>
        </div>
    </div>
@endsection
