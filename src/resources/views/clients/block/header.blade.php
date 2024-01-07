<header>
    <div class="row bg">
        <div class="col-3 d-flex justify-content-end">
            <h1 class="margin-left">THƯ VIỆN</h1>
        </div>


        <?php
        $user_name = Session::get('user_name');
        if ($user_name == null) {
        ?>
            <div class="col-9 d-flex justify-content-end">
                <a class="nav-link a margin-right dn" href="{{URL::to('Login')}}">Đăng nhập</a>
            </div>
        <?php
        } else {
        ?>
            <div class="col-9 d-flex justify-content-end">
                <a class="nav-link a margin-right dn" href="">{{$user_name}}</a>
                <a class="nav-link a margin-right dn" href="{{URL::to('logout-user')}}">Đăng xuất</a>
            </div>
        <?php
        }
        ?>



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
                    <a class="nav-link a" href="{{ route('contact_user') }}">LIÊN HỆ</a>
                </li>
            </ul>
        </div>
    </div>
</header>