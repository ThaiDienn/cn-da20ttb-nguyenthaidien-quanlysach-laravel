@extends ('layout.client')
@section ('title')
{{$title}}
@endsection

@section ('body')

@if (session('msg'))
<div class="alert alert-success">{{ session('msg') }}</div>
@endif
<div class="container-sm">
   <div class="row bgg">
      <div class="col-sm-6 d-flex justify-content-center">
         <ul class="nav">

            @foreach($all_cate as $key => $cate)
            <li class="nav-item lii">
               <a class="nav-link a" href="{{URL::to('/danh-muc-san-pham/'.$cate->id)}}">{{$cate->name}}</a>
            </li>
            @endforeach
         </ul>
      </div>
      <div class="col-sm-4 d-flex justify-content-end">
         <ul class="nav">
            <li class="nav-item li">
               <a class="nav-link active a " aria-current="page" href=""><input type="search" name="searchs" class="form-control width" placeholder="---Nhập từ khóa tìm kiếm--- "></a>
            </li>
            <li class="nav-item li">
               <a class="nav-link a" href=""><button type="button" class="btn btn-primary">Tìm kiếm</button></a>
            </li>
         </ul>
      </div>
      <!-- <div class="col-sm-2">
         <ul class="nav">
            <li class="nav-item li">
               <a class="nav-link a" href="{{ route('allproduct') }}">Danh sách sản phẩm</a>
            </li>
         </ul>
      </div> -->
   </div>

   @if (session('newProductImagePath'))
   <img src="{{ session('newProductImagePath') }}">
   @endif


   <div style="margin-top: 100px;"></div>

   <div class="row">
      @foreach($all_product as $key => $product)
      <div class="col-3 gallery">
         <a href="{{URL::to('/chi-tiet-san-pham/'.$product->id)}}" target="_blank"><img src="uploads/product/{{$product->hinhsach}}" alt=""></a>
         <!-- <a href=""><img src="assets/clients/images/tt2.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/tt3.jpg" alt=""></a>
         <a href=""><img src="assets/clients/images/tt4.jpg" alt=""></a> -->
      </div>
      @endforeach
   </div>


   @endsection

   @section ('body')

   @endsection