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
                    <a class="nav-link a" href="{{ route('allproduct') }}">Chi tiet san pham</a>
                </li>
            </ul>
        </div> -->
    </div>

    @if (session('newProductImagePath'))
    <img src="{{ session('newProductImagePath') }}">
    @endif


    <div style="margin-top: 100px;"></div>

    <div class="row justify-content-center">
        @foreach($details_product as $key => $product)
        <div class="container details d-flex justify-content-center">

                <div class="col-xs-5 item-photo" style="width: 300px">
                    <img src="../uploads/product/{{$product->hinhsach}}" />
                </div>

                <div class="col-xs-5" style="border:0px solid gray">

                    <h3>{{$product->tensach}}</h3>

                    <h5 style="color:#337ab7">Thể loại: {{$product->name}}<a href="#"></a> 
                    </h5>

                    <form action="" method="post">
                        {{csrf_field()}}
                    </form>
                    <br>

                    <h4>Thông tin sách</h4>
                    <div style="width:100%;border-top:1px solid silver; padding: 15px;">
                        <p>
                            Tác giả: {{$product->tacgia}}
                        </p>

                        <p>
                            Tình trạng:
                            @if($product->tinhtrang == 1)
                                Đã hết
                            @else
                                Còn sách
                            @endif
                        </p>
                </div>

                <div class="col-xs-2" style="margin-left: 50px">
                    <!-- <ul class="menu-items">
                        <li class="active">Thông tin sách</li>
                    </ul> -->
                    
                        <!-- <ul>
                    <br>
                </ul> -->
                    </div>
                </div>
        </div>
        @endforeach
    </div>

    @endsection
    @section ('body')
    @endsection