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

<h1>Thêm sản phẩm</h1>
<hr>
<form action="{{ route('postproduct') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">

            <div class="mb-3">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control"
                name="product_name" placeholder="Tên sản phẩm" value="{{old('product_name')}}">
                @if ($errors->has('fullname'))
                    <span style="color: red;">{{ $errors->first('fullname') }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Tác giả</label>
                <input type="text" class="form-control"
                    name="product_name" placeholder="Tác giả" value="{{old('product_name')}}">
                @if ($errors->has('email'))
                    <span style="color: red;">{{ $errors->first('email') }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Thể loại</label>
                <select name="status" class="form-control" id="">
                    <option value="0" {{old('status')==0?'selected':false}} >Chưa kích hoạt</option>
                    <option value="1" {{old('status')==1?'selected':false}}>Kích hoạt</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Tình trạng</label>
                <select name="status" class="form-control" id="">
                    <option value="0" {{old('status')==0?'selected':false}} >Chưa kích hoạt</option>
                    <option value="1" {{old('status')==1?'selected':false}}>Kích hoạt</option>
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
    <button type="submit" class="btn btn-primary">Thêm</button>
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

            reader.onload = function () {
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


