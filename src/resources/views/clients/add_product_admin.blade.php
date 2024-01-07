@extends ('layout.client_admin')
@section ('title')
{{$title}}
@endsection


@section ('body_admin')
<!-- @if (session ('msg'))
<div class="alert alert-success">{{session('msg')}}</div>
@endif -->
@if (session ('msg'))
<div class="alert alert-danger">{{session('msg')}}</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
@endif


<h1 class="mg">Thêm sản phẩm</h1>
<hr>
<form action="{{ route('postproduct') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mg">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" value="{{old('product_name')}}">
                @if ($errors->has('name'))
                <span style="color: red;">{{ $errors->first('name') }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Tác giả</label>
                <input type="text" class="form-control" name="tacgia" placeholder="Tác giả" value="{{old('tacgia')}}">
                @if ($errors->has('tacgia'))
                <span style="color: red;">{{ $errors->first('tacgia') }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Thể loại</label>
                <select class="form-control" name="maloai">
                    <option value="0">Thể loại</option>
                    @if (!empty(getAllMaloai() ))
                    @foreach(getAllMaloai() as $item)
                    <option value="{{$item->id}}" {{ request()->maloai==$item->id? 'selected':false }}>{{$item->name}}</option>
                    @endforeach
                    @endif
                </select>
                @if ($errors->has('maloai'))
                <span style="color: red;">{{ $errors->first('maloai') }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Tình trạng</label>
                <select name="status" class="form-control" id="">
                    <!-- <option value="0" {{old('status')==0?'selected':false}}>Còn</option>
                    <option value="1" {{old('status')==1?'selected':false}}>Hết</option> -->
                    <option value="0">Còn</option>
                    <option value="1">Hết</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" name="file" id="fileInput" onchange="previewImage()">
            </div>
        </div>
        <div class="col-6 center">
            <a id="imageLink" class="a" style="display: none;">Ảnh minh họa</a>
            <!-- Thêm một thẻ img để hiển thị ảnh xem trước -->
            <img id="preview" src="" alt="Ảnh xem trước" style="display: none; margin-top: 20px; width: 300px; height: 400px; margin-left:200px">
        </div>
        <input type="hidden" name="image_path" id="imagePath">

        <!-- <img id="preview" src="" alt="Ảnh xem trước" style="max-width: 100%; max-height: 200px; margin-top: 15px; display: none;"> -->
    </div>
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    <a href="{{route('allproduct')}}" class="btn btn-warning">Quay lại</a>

</form>
@endsection

@section ('js')
<script>
    function previewImage() {
        var input = document.getElementById('fileInput');
        var imgPath = document.getElementById('imagePath');
        var imageLink = document.getElementById('imageLink');
        var imgPreview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function() {
                imgPath.value = reader.result;

                // Hiển thị ảnh xem trước ở vị trí cần
                imgPreview.style.display = 'block';
                imgPreview.src = reader.result;
                imageLink.style.display = 'inline';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection