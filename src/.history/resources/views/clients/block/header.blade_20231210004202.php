    <header>
       <div class="row bg">
            <div class="col-3 d-flex justify-content-end">
                <h1 class="margin-left">THƯ VIỆN</h1>
            </div>
            <div class="col-9 d-flex justify-content-end">
                <a class="nav-link a margin-right dn" href="">Đăng nhập</a>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <ul class="nav">
                    <li class="nav-item li">
                        <a class="nav-link active a " aria-current="page" href="{{route('home')}}">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item li">
                        <a class="nav-link a" href="{{route('product')}}">TÀI NGUYÊN</a>
                    </li>
                    <li class="nav-item li">
                        <a class="nav-link a" href="{{ route('admin.index') }}">THÔNG TIN TÀI KHOẢN</a>
                    </li>
                    <li class="nav-item li">
                        <a class="nav-link a" href="{{ route('contact') }}">LIÊN HỆ</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>