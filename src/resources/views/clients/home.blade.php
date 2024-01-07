@extends ('layout.client')
@section ('title')
{{$title}}
@endsection

@section ('body')
<div class="container-sm">
   <div class="row">
      <div class="col">
         <img class="tv" src="assets/clients/images/tv.jpg" alt="">
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
   <!-- <div class="row bgg">
      <div class="col-9">
      </div>
      <div class="col-2">
         <input type="search" name="searchs" class="form-control center width" placeholder="---Nhập từ khóa tìm kiếm--- ">
      </div>
      <div class="col-1">
         <button type="button" class="btn btn-primary">Tìm kiếm</button>
      </div>
      </div>
   </div> -->
   <div class="row">
      <div class="col center h2 ">
         <h2>
            <marquee behavior="scroll" bgcolor="#0dcaf0">
               Một số Sách hiện có
            </marquee>
         </h2>
      </div>
   </div>
   <div class="row">

   @foreach($all_product as $key => $product)
      <div class="col-3 gallery">
         <a href="{{URL::to('/chi-tiet-san-pham/'.$product->id)}}" target="_blank">
            <img src="uploads/product/{{$product->hinhsach}}" alt="">
         </a>
      </div>
   @endforeach
   </div>
   <!-- <div class="row">
      <div class="col center h2">
         <h2>
            <marquee behavior="scroll" bgcolor="#0dcaf0">
               Một số Sách chuẩn bị cập nhật
            </marquee>
         </h2>
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
   </div> -->
</div>
@endsection