@extends ('layout.admin')
@section ('title')
{{$title}}
@endsection

@section('body')

<div class="container-sm">
   <div class="row">
      <div class="col">
         <!-- <img class="tv" src="assets/clients/images/tv.jpg" alt=""> -->
      </div>
   </div>
   <div class="row li">
      <div class=" col d-flex justify-content-center align-items-center bgg">
         <ul class="nav">
            <li class="nav-item">
               <a class="nav-link active a " aria-current="page" href=""><input type="search" name="searchs"
                  class="form-control center width" placeholder="---Nhập từ khóa tìm kiếm--- "></a>
            </li>
            <li class="nav-item">
               <a class="nav-link a" href=""><button type="button" class="btn btn-primary">Tìm kiếm</button></a>
            </li>
         </ul>
      </div>
   </div>

   <div class="row">
      <div class="col center h2 ">
         <h2>
            <marquee behavior="scroll" bgcolor="#0dcaf0">
               Trang Quản trị Admin
            </marquee>
         </h2>
      </div>
   </div>
   <div class="row">

   </div>

</div>
@endsection