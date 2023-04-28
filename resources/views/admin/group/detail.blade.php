@extends('admin.layouts.master')
@section('content')
<body>
    <div class="page-container">
        <div class="main-content">
            <div class="container">
                <section class="wrapper">
                    <div class="page-section">
                        <form method="post" action="{{ route('group.update_position',[$group->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên Quyền:</label> {{ $group->name }}
                                    </div>
                                    <div class="form-group">
                                            <div class="row">
                                                @foreach ($group_names as $group_namea => $roles)
                                                    <div class="col-lg-6">
                                                        <div class="list-group-header" style="color:rgb(2, 6, 249) ;">
                                                            <h5> Nhóm: {{ __($group_namea) }}</h5>
                                                        </div>
                                                        @foreach ($roles as $role)
                                                            @if ($role['name'] == 'admin' && $group->name == 'Admin')
                                                                <div
                                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                                    <span
                                                                        style="color: rgb(4, 5, 5) ;">{{ __($role['name']) }}</span>
                                                                    <label class="form-check form-switch">
                                                                        <input
                                                                            class="checkItem form-check-input checkItem"
                                                                            type="checkbox" id="" checked
                                                                            disabled>
                                                                        <span class="switcher-indicator"></span>
                                                                    </label>
                                                                </div>
                                                                @continue
                                                            @endif
                                                            <div
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                <span
                                                                    style="color: rgb(4, 5, 5) ;">{{ __($role['name']) }}</span>
                                                                <!-- .switcher-control -->
                                                                <label class="form-check form-switch ">
                                                                    <input type="checkbox" @checked(in_array($role['id'], $userRoles))
                                                                        name="roles[]"
                                                                        class="checkItem form-check-input checkItem"
                                                                        value="{{ $role['id'] }}">
                                                                    <span class="switcher-indicator"></span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                    </div>
                                    <br>
                                    <div class="form-actions">
                                        <button class="btn btn-success" type="submit">Duyệt</button>
                                        <a href="{{ route('group.index') }}" class="btn btn-danger"
                                            type="submit">Hủy</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </main>
                </section>
            </div>
        </div>
    </div>
</body>
@endsection