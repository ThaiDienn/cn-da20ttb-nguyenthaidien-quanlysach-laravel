@extends ('layout.client_admin')
@section ('title')
{{$title}}
@endsection


@section ('body_admin')

@if (session ('msg'))
<div class="alert alert-success">{{session('msg')}}</div>
@endif

<h1>{{$title}}</h1>
<a href="{{route('getproduct')}}" class="btn btn-primary">Thêm sản phẩm</a>
<a href="{{URL::to('san-pham-admin')}}" class="btn btn-warning">Quay lại</a>
<hr>

<form action="" method="get" class="mb-3">
    <div class="row">
        <div class="col-3">
            <select class="form-control" name="status">
                <option value="0">Tất cả trạng thái</option>
                <option value="active" {{ request()->status=='active'?
                    'selected':false }}>Còn</option>
                <option value="inactive" {{ request()->status=='inactive'?
                    'selected':false }}>Hết</option>
            </select>
        </div>
        <div class="col-3">
            <select class="form-control" name="maloai">
                <option value="0">Tất cả loại sách</option>
                @if (!empty(getAllMaloai() ))
                @foreach(getAllMaloai() as $item)
                <option value="{{$item->id}}" {{ request()->maloai==$item->id?
                    'selected':false }}>{{$item->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="col-4">
            <input type="search" name="keywords" class="form-control" placeholder="--Từ khóa tìm kiếm-- "
                value="{{ request()->keywords }}">
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
        </div>
    </div>

</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Thể loại</th>
            <th>Tình trạng</th>
            <th width="15%">Hình sách</th>
            <th width="15%">Ngày thêm</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($all_product))
            @foreach($all_product as $key => $item) 
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->tensach}}</td>
            <td>{{$item->tacgia}}</td>
            <td>{{$item->name}}</td>
            <td>{!! $item->tinhtrang==0?'
                <button class="btn btn-success btn-sm">
                    Còn
                </button>':
                ' <button class="btn btn-danger btn-sm">
                    Hết
                </button>'!!}
            </td>
            <td><img src="uploads/product/{{$item->hinhsach}}" alt="{{$item->tensach}}" style="max-width: 100px; max-height: 100px;"></td>

            <td>{{$item->ngaythem}}</td>
            <td>
                <a href="{{URL::to('/edit-product/'.$item->product_id)}}" class="btn btn-warning btn-sm">Sửa</a>
            </td>
            <td>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                    href="{{ route('delete', ['id'=>$item->product_id] ) }}" class="btn btn-danger btn-sm">Xóa</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="9" class="center">Không có sản phẩm</td>
        </tr>
        @endif
    </tbody>

</table>


@endsection

@section ('js')
<script>

</script>
@endsection
