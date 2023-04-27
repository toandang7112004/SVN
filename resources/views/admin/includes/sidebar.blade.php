<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('admin.index') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Hotel TV</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin.index') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Background</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Profiles</a>
                <div class="dropdown-menu bg-transparent border-0">
                    @if (isset(Auth::user()->id))
                        <a href="{{ route('admin.profiles',Auth::user()->id) }}" class="dropdown-item">Thông tin cá nhân</a>
                    @endif
                    <hr>
                    @if (isset(Auth::user()->id))
                    <a href="{{ route('form_change_password',Auth::user()->id) }}" class="dropdown-item">Đổi mật khẩu</a>
                    @endif
                </div>
            </div>
            @if (Auth::user()->type == 1 || Auth::user()->type == 2)
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Hotel Info</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('hotel_info.index') }}" class="dropdown-item">Danh sách</a>
                    <hr>
                    <a href="{{ route('hotel_info.create') }}" class="dropdown-item">Thêm mới</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Channel</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('channel.index') }}" class="dropdown-item">Danh sách</a>
                    <hr>
                    <a href="{{ route('channel.create') }}" class="dropdown-item">Thêm mới</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Menu</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('menu.index') }}" class="dropdown-item">Danh sách</a>
                    <hr>
                    <a href="{{ route('menu.create') }}" class="dropdown-item">Thêm mới</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Service</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('service.index') }}" class="dropdown-item">Danh sách</a>
                    <hr>
                    <a href="{{ route('service.create') }}" class="dropdown-item">Thêm mới</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Movie</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('movie.index') }}" class="dropdown-item">Danh sách</a>
                    <hr>
                    <a href="{{ route('movie.create') }}" class="dropdown-item">Thêm mới</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Music</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('music.index') }}" class="dropdown-item">Danh sách</a>
                    <hr>
                    <a href="{{ route('music.create') }}" class="dropdown-item">Thêm mới</a>
                </div>
            </div>
            @endif
            @if (Auth::user()->type == 1)
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>User</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('user.list') }}" class="dropdown-item">Danh sách</a>
                    <hr>
                    <a href="{{ route('user.create') }}" class="dropdown-item">Thêm mới</a>
                </div>
            </div>
            @endif
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Position</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('group.index') }}" class="dropdown-item">Danh sách</a>
                    <hr>
                    <a href="{{ route('group.create') }}" class="dropdown-item">Thêm mới</a>
                </div>
            </div>
        </div>
    </nav>
</div>
