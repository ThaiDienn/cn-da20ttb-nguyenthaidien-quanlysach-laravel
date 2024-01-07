@extends ('layout.client_admin')
@section ('title')
{{$title}}
@endsection

@section ('body_admin')

@if (session('msg'))
<div class="alert alert-success">{{ session('msg') }}</div>
@endif
<div class="container-sm">
   <div class="row bgg">
      <div class="col-sm-6 d-flex justify-content-center">
         <ul class="nav">

            @foreach($all_cate as $key => $cate)

            <li class="nav-item lii">
               <a class="nav-link a" href="">{{$cate->name}}</a>
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
      <div class="col-sm-2">
         <ul class="nav">
            <li class="nav-item li">
               <a class="nav-link a" href="{{ route('allproduct') }}">Danh sách sản phẩm</a>
            </li>
         </ul>
      </div>
   </div>

   @if (session('newProductImagePath'))
   <img src="{{ session('newProductImagePath') }}">
   @endif

   <div style="margin-top: 100px;"></div>


   @endsection

   @section ('body')

   @endsection