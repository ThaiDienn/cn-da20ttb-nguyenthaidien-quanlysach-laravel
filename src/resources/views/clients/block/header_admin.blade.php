<header>
    <div class="row bg">
        <div class="col-3 d-flex justify-content-end">
            <h1 class="margin-left">Admin

            </h1>
        </div>
        <div class="col-9 d-flex justify-content-end">

            <?php
            $admin_name = Session::get('admin_name');

            if ($admin_name == null) {
            ?>
                <a class="nav-link a margin-right dn" href="{{route('login-admin')}}">Đăng nhập</a>
            <?php
            } else {
            ?>
                <a class="nav-link a margin-right dn" href="">{{$admin_name}}</a>
                <a class="nav-link a margin-right dn" href="{{URL::to('logout-admin')}}">Đăng xuất</a>
            <?php
            }
            ?>

        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">

            <ul class="nav">
                <li class="nav-item li">
                    <a class="nav-link active a " aria-current="page" href="{{URL::to('admin-dashboard')}}">TRANG CHỦ</a>
                </li>
                <li class="nav-item li">
                    <a class="nav-link a" href="{{ route('allproduct') }}">TÀI NGUYÊN</a>
                </li>
                <!-- <li class="nav-item li">
                    <a class="nav-link a" href="{{URL::to('lien-he-admin')}}">LIÊN HỆ</a>
                </li> -->
                <li class="nav-item li">
                    <a class="nav-link a" href="{{URL::to('all-user')}}">THÔNG TIN ĐỌC GIẢ</a>
                </li>
                <li class="nav-item li">
                    <a class="nav-link a" href="{{ route('admin.listmuon') }}">DANH SÁCH PHIẾU MƯỢN</a>
                </li>
            </ul>
        </div>
    </div>
</header>