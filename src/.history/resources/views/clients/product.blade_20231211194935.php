@extends ('layout.client')
@section ('title')
{{$title}}
@endsection

@section ('body')
<div class="container-sm">
   <div class="row bgg">
      <div class="col-sm-1"></div>
      <div class="col-sm-5 d-flex justify-content-center mg">
         <ul class="nav">
            <li class="nav-item lii">
               <a class="nav-link a" href="">Văn học</a>
            </li>
            <li class="nav-item lii">
               <a class="nav-link a" href="">Lịch sử</a>
            </li>
            <li class="nav-item lii">
               <a class="nav-link a" href="">Kinh tế</a>
            </li>
            <li class="nav-item lii">
               <a class="nav-link a" href="">Toán học</a>
            </li>
            <li class="nav-item lii">
               <a class="nav-link a" href="">Tiểu thuyết</a>
            </li>
            <li class="nav-item lii">
               <a class="nav-link a" href="">Tiếng anh</a>
            </li>
         </ul>
      </div>
      <div class="col-sm-4 d-flex justify-content-end">
         <ul class="nav">
            <li class="nav-item li">
               <a class="nav-link active a " aria-current="page" href=""><input type="search" name="searchs"
                     class="form-control width" placeholder="---Nhập từ khóa tìm kiếm--- "></a>
            </li>
            <li class="nav-item li">
               <a class="nav-link a" href=""><button type="button" class="btn btn-primary">Tìm kiếm</button></a>
            </li>
         </ul>
      </div>
      <div class="col-sm-2">
         <ul class="nav">
            <li class="nav-item li">
               <a class="nav-link a" href="{{ route('getproduct') }}"><button type="button" class="btn btn-primary">Thêm
                     sản phẩm</button></a>
            </li>
         </ul>
      </div>
   </div>
   <div class="row h2">
      <div class="col-3 gallery">
         <a href="" target="_blank"><img src="assets/clients/images/tt1.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/tt2.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/tt3.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/tt4.jpg" alt=""></a>
      </div>
      <div class="col-3">
         <a href=""><img src="assets/clients/images/vh1.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/vh2.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/vh3.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/vh4.jpg" alt=""></a>
      </div>
      <div class="col-3">
         <a href=""><img src="assets/clients/images/kt1.png" alt=""></a>
         <a href=""><img src="assets/clients/images/kt2.png" alt=""></a>
         <a href=""><img src="assets/clients/images/kt3.png" alt=""></a>
         <a href=""><img src="assets/clients/images/kt4.jpg" alt=""></a>
      </div>
      <div class="col-3">
         <a href=""><img src="assets/clients/images/ls1.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/ls2.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/ls3.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/ls4.jpg" alt=""></a>

      </div>
   </div>
   <div class="row">
      <div class="col-3">
         <a href=""><img src="assets/clients/images/sach2.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/sach3.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/sach4.jpg" alt=""></a>
      </div>
      <div class="col-3">
         <a href=""><img src="assets/clients/images/sach5.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/sach6.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/sach7.jpg" alt=""></a>
      </div>
      <div class="col-3">
         <a href=""><img src="assets/clients/images/sach8.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/sach9.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/sach10.jpg" alt=""></a>
      </div>
      <div class="col-3">
         <a href=""><img src="assets/clients/images/sach11.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/sach12.jpg" alt=""></a>
      </div>
   </div>
</div>
@endsection