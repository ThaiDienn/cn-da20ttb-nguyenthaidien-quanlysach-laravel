@extends ('layout.client')
@section ('title')
{{$title}}
@endsection


@section ('body')
@if (session ('msg'))
<div class="alert alert-success">{{session('msg')}}</div>
@endif
<h1>{{$title}}</h1>
<a href="{{route('admin.getmuon')}}" class="btn btn-primary">Tạo phiếu mượn</a>
<hr>

<form action="" method="get" class="mb-3">
    <div class="row">
        <dic class="col-8"></dic>
        <div class="col-3">
            <input type="search" name="keywords" class="form-control" placeholder="--Từ khóa tìm kiếm-- " value="{{ request()->keywords }}">
        </div>
        <div class="col-1">
            <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
        </div>
    </div>

</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th width="15%">Số điện thoại</th>
            <th width="15%">Họ và tên</th>
            <th width="15%">Email</th>
            <th>Tên sách</th>
            <th width="10%">Ngày mượn</th>
            <th width="10%">Ngày trả</th>
            <th width="7%">Cập nhật</th>
        </tr>
    </thead>
    <tbody>


        @if($ds_muon->isEmpty())
        <tr>
            <td colspan="9" class="center">Không có phiếu mượn</td>
        </tr>
        @else

        @foreach($ds_muon as $key =>$item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->sdt}}</td>
            <td>{{ $item-> fullname }}</td>
            <td>{{ $item-> email }}</td>
            <td>{{ $item-> tensach }}</td>
            <td>{{$item-> ngaymuon}}</td>


            <td>
                @if ($item->ngaytra)
                {{$item->ngaytra}}
                @endif
            </td>

            <td>
                <a href="{{URL::to('/cap-nhat-ngay-tra/'.$item->id_phieumuon)}}" class="btn btn-warning btn-sm">Cập nhật</a>
            </td>
        </tr>
        @endforeach
        @endif

    </tbody>

</table>




@endsection

@section ('js')
<script>

</script>
@endsection