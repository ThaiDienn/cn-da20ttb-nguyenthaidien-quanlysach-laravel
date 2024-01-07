@extends ('layout.client_admin')
@section ('title')
   {{$title}}
@endsection


@section ('body_admin')
@if (session ('msg'))
<div class="alert alert-success">{{session('msg')}}</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
@endif
<h1>{{$title}}</h1>

<form action="{{ route('admin.post-edit') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="">Họ và tên</label>
        <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" value="{{old('fullname') ?? $userDetail->fullname}}">
        @if ($errors->has('fullname'))
            <span style="color: red;">{{ $errors->first('fullname') }}</span>
        @endif
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email') ?? $userDetail->email }}">
        @if ($errors->has('email'))
            <span style="color: red;">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="mb-3">
        <label for="">Nhóm</label>
        <select name="group_id" class="form-control" id="">
            <option value="0">Chọn nhóm</option>
            @if (!empty($allGroups))
                @foreach($allGroups as $item)
                    <option value="{{$item->id}}" {{old('group_id')==$item->id || $userDetail->group_id==$item->id?'selected':false}} >{{$item->name}}<option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('group_id'))
            <span style="color: red;">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="mb-3">
        <label for="">Trạng thái</label>
        <select name="status" class="form-control" id="">
            <option value="0" {{old('status')==0 || $userDetail->status==0?'selected':false}} >Chưa kích hoạt</option>
            <option value="1" {{old('status')==1 || $userDetail->status==1?'selected':false}}>Kích hoạt</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{URL::to('all-user')}}" class="btn btn-warning">Quay lại</a>

</form>
@endsection

