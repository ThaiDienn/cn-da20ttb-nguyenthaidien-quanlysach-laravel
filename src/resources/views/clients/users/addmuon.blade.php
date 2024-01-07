@extends ('layout.client')
@section ('title')
   {{$title}}
@endsection


@section ('body')

@if (session ('msg'))
<div class="alert alert-success">{{session('msg')}}</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
@endif
<h1>{{$title}}</h1>

<form action="{{ route('admin.getmuon') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="">số điên thoại</label>
        <input type="text" class="form-control"
         name="sdt" placeholder="Số điện thoại" value="{{old('sdt')}}">
    </div>
    <div class="mb-3">
        <label for="">Họ và tên</label>
        <input type="text" class="form-control"
         name="user_name" placeholder="Họ và tên" value="{{old('user_name')}}">
        <!-- @if ($errors->has('fullname'))
            <span style="color: red;">{{ $errors->first('fullname') }}</span>
        @enderror -->
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="text" class="form-control" name="user_email" placeholder="Email" value="{{old('user_email')}}">
        <!-- @if ($errors->has('email'))
            <span style="color: red;">{{ $errors->first('email') }}</span>
        @enderror -->
    </div>
    <div class="mb-3">
        <label for="">Tên sách</label>
        <input type="text" class="form-control" name="product_name" placeholder="Tên sách" value="{{old('product_name')}}">
        <!-- @if ($errors->has('email'))
            <span style="color: red;">{{ $errors->first('email') }}</span>
        @enderror -->
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="{{route('admin.listmuon')}}" class="btn btn-warning">Quay lại</a>

</form>
@endsection

