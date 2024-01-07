@extends ('layout.client')
@section ('title')
{{$title}}
@endsection

@section ('body')
<h2 class="mgg">Thông tin liên hệ</h2>
<form>
    <iframe class="mg"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.126136853455!2d106.34394437487032!3d9.923451590178084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0175ea296facb%3A0x55ded92e29068221!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBUcsOgIFZpbmg!5e0!3m2!1svi!2s!4v1701950901467!5m2!1svi!2s"
        width="1400" height="460" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    <ul class="li mg">
        <li>Số điện thoại: <a class="a" href="tel:0988663855">0988663855</a></li>
        <li>Email: <a class="a" href="mailto:thaidien989@gmail.com">thaidien989@gmail.com</a></li>
        <li>Địa chỉ: Long An, Càng Long, Trà Vinh</li>
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