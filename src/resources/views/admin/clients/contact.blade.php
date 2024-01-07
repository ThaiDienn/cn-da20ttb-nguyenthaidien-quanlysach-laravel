@extends ('layout.client')
@section ('title')
{{$title}}
@endsection

@section ('body')
<h2 class="mgg">Thông tin liên hệ</h2>
<form>
    <iframe class="mg"
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125753.27319484297!2d106.26245369790082!3d9.951440613971005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a017515cc705df%3A0xade5b5649cd70f79!2zVHAuIFRyw6AgVmluaCwgVHLDoCBWaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1703681449385!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <ul class="li mg">
        <li>Số điện thoại: <a class="a" href="tel:0988663855">0123456789</a></li>
        <li>Email: <a class="a" href="mailto:thaidien989@gmail.com">admin@gmail.com</a></li>
        <li>Địa chỉ:Trà Vinh</li>
    </ul>
</form>
@endsection
@section ('css')
<style>
    .li {
        list-style-type: none;
        font-weight: bold;
    }

    .mg {
        margin-left: 40px;
    }

    .mgg {
        margin-left: 90px;
    }

    .a {
        color: black;
    }
</style>
@endsection