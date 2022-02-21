@extends('home.layouts.app')

@section('title', 'Thiên Ân Phát - Nơi biến ước mơ thành hiện thực.')
@section('description', 'Thiên Ân Phát tự hào là đơn vị chuyên nghiệp thi công lắp đặt nhôm Xingfa, kính cường lực, cửa nhựa, kính bếp... uy tín.')
@section('css')

<style>
#image_1418508498 {
    width: 100%;
}
#section_1752396927 {
    padding-top: 30px;
    padding-bottom: 30px;
    margin-bottom: 0px;
}
#section_1752396927 .section-bg.bg-loaded {
    background-image: url(wp-content/uploads/2020/11/bg.png);
}
.header.show-on-scroll, .stuck .header-main {
    height: 78px!important;
}
</style>
@endsection
@section('content')
@include('home.includes.silder')
<section class="section" id="section_1752396927">
    <div class="bg section-bg fill bg-fill bg-loaded"></div>
    <div class="section-content relative">
        <div class="row" style="max-width:1280px" id="row-310751448">
            <div id="col-573082905" class="col medium-6 small-12 large-6">
                <div class="col-inner text-center">
                    <p class="thin-font" style="text-align: center;">
                        <span style="font-family: Utm-american-sans; font-size: 200%;">Giới thiệu</span>
                    </p>
                    <h1 style="text-align: center;"><span style="color: #093c4c;" data-cms="{{app()->getLocale()}}-index-1">CÔNG TY TNHH THIÊN ÂN PHÁT</span></h1>
                    <p style="text-align: justify;" data-cms="{{app()->getLocale()}}-index-2">Phúc Đạt là công ty chuyên sản xuất – thi công lắp đặt nhôm kính, nhôm Xingfa, kính cường lực tại TpHCM; với uy tín, đội ngũ chuyên nghiệp, thi công nhanh chóng &amp; chất lượng, đặc biệt chính sách Bảo hành 12-24 tháng.</p>
                    <p class="has-normal-font-size" style="text-align: justify;" data-cms="{{app()->getLocale()}}-index-3">Hiện tại chúng tôi cung cấp đa dạng các sản phẩm về nhôm kính. Trong đó có các sản phẩm thế mạnh, cũng là các sản phẩm hiện được cung cấp lắp đặt tên toàn quốc. Bao gồm:</p>
                    <p class="has-normal-font-size" style="text-align: justify;" data-cms="{{app()->getLocale()}}-index-4">Sản phẩm cửa nhôm: cửa nhôm Xingfa, nhôm hệ 700, cửa nhôm hệ 1000, nhôm Austdoor, Topal, Việt Pháp, Việt Nhật, Xingfa Việt Nam…</p>
                    <p class="has-normal-font-size" style="text-align: justify;" data-cms="{{app()->getLocale()}}-index-5">Sản phẩm cửa kính: cửa kính cường lực, cửa kính lùa, cửa kính xếp trượt, cửa tự động, bán tự động &amp; các cửa kính theo hệ khung sắt / gỗ / inox.</p>
                    <a href="{{ route('about-us', ['gioi-thieu']) }}" target="_self" class="button primary is-outline is-smaller" style="border-radius:21px;" data-wpel-link="internal">
                        <span>Xem thêm</span>
                    </a>
                </div>
            </div>
            <div id="col-959917025" class="col medium-6 small-12 large-6">
                <div class="col-inner">
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1418508498">
                        <div class="img-inner dark">
                            <img width="595" height="448" src="wp-content/uploads/2021/01/cong-ty-phuc-dat-door.png" class="attachment-large size-large" loading="lazy" sizes="(max-width: 595px) 100vw, 595px">						
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('home.category.group-catetory-index')
@include('home.category.group-sub-catetory')
@include('home.build.build-finish')
@include('home.includes.form-contact')
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.contact100-form-btn').click(function (e) {
            e.preventDefault();
            $('.wrap-contact100 .loader').removeClass('hidden');
            $('.wrap-contact100 .block-form').addClass('hidden');
            $.ajax({
                type: 'post',
                url: "{{ route('create-contact') }}",
                data: $('.contact100-form').serialize(),
                success: function (res) {
                    if (res.success) {
                        $('.wrap-contact100 .loader').addClass('hidden');
                        $('.wrap-contact100 .block-form').removeClass('hidden');
                    }
                    $('.contact100-form')[0].reset()
                },
                error:function(){ 
                    $('.contact100-form')[0].reset()
                    $('.wrap-contact100 .loader').addClass('hidden');
                    $('.wrap-contact100 .block-form').removeClass('hidden');
                }
            });
        });
    });
</script>
@endsection
