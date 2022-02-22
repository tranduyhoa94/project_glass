@extends('home.layouts.app')

@section('title', __('About Us'))

@section('css')
<style>
#image_1755705099 {
    width: 70%;
}
@media (min-width:550px) {
    #image_1755705099 {
        width: 30%;
    }
}
@media (min-width:850px) {
    #image_1755705099 {
        width: 30%;
    }
}
#image_666919309 {
    width: 70%;
}
@media (min-width:550px) {
    #image_666919309 {
        width: 30%;
    }
}
@media (min-width:850px) {
    #image_666919309 {
        width: 30%;
    }
}
#gap-161547613 {
    padding-top: 10px;
}
#col-241380788 > .col-inner {
    padding: 0px 20px 0px 20px;
}
#section_313004647 {
    padding-top: 30px;
    padding-bottom: 30px;
}
#col-1000140759 > .col-inner {
    padding: 0px 0 0px 0px;
    margin: 0px 0 0px 0px;
}
#row-2093806391 > .col > .col-inner {
    padding: 0 0px 0px 0px;
}
#section_1663773892 {
    padding-top: 50px !important;
    padding-bottom: 30px !important;
}

</style>

@endsection
@section('content')
<section class="section" id="section_313004647">
    <div class="bg section-bg fill bg-fill bg-loaded"></div>
    <div class="section-content relative">
        <div class="row row-collapse" style="max-width:1280px" id="row-1020213882">
            <div id="col-2120442213" class="col medium-6 large-6">
                <div class="col-inner text-center">
                    <h2 style="text-align: center;" data-cms="{{app()->getLocale()}}-into-1"><span style="font-family: robotocondensed-b; color: #000000;">
                        <strong>CÔNG TY TNHH THIÊN ÂN PHÁT</strong></span>
                    </h2>
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_666919309">
                        <div class="img-inner dark" style="margin:-15px 0px 0px 0px;">
                            <img width="300" height="45" src="../wp-content/uploads/2020/11/Icon-Didver.png" class="attachment-large size-large" alt="" loading="lazy">						
                        </div>
                    </div>
                    <div class="icon-box featured-box icon-box-top text-left">
                        <div class="icon-box-img" style="width: 167px">
                            <div class="icon">
                                <div class="icon-inner"></div>
                            </div>
                        </div>
                        <div class="icon-box-text last-reset">     
                            <p data-cms="{{app()->getLocale()}}-into-2"><i class="far fa-bookmark"></i> MST: 0912 974 576</p>
                            <p data-cms="{{app()->getLocale()}}-into-3"><i class="fas fa-mobile-alt"></i> <strong> 0905.532.506</strong></p>
                            <p data-cms="{{app()->getLocale()}}-into-4"><i class="far fa-envelope"></i> Email: dtthienanphat@gmail.com</p>
                            <p data-cms="{{app()->getLocale()}}-into-5"><i class="fas fa-globe-americas"></i> Website: <a href="{{ route('index') }}" data-wpel-link="internal">www.dtthienanphat.com</a></p>
                            <p data-cms="{{app()->getLocale()}}-into-6"><i class="fas fa-map-marker-alt"></i> Trụ sở: 62 Bàu Gia Thượng 3, Hòa Thọ Đông, Cẩm Lệ, Đà Nẵng</p>
                            <p data-cms="{{app()->getLocale()}}-into-7"><i class="fas fa-map-marker-alt"></i> Showroom: BP BCG, 40 Bích Khuê, Hòa Xuân, Đà Nẵng</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="col-241380788" class="col form-lienhe medium-6 large-6">
                <div class="col-inner text-center">
                    <h2 style="text-align: center;"><span style="font-size: 100%; color: #000000; font-family: robotocondensed-b;">LIÊN HỆ VỚI CHÚNG TÔI</span></h2>
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1755705099">
                        <div class="img-inner dark" style="margin:-15px 0px 0px 0px;">
                            <img width="300" height="45" src="../wp-content/uploads/2020/11/Icon-Didver.png" class="attachment-large size-large" alt="" loading="lazy">						
                        </div>
                    </div>
                    <div id="gap-161547613" class="gap-element clearfix" style="display:block; height:auto;"></div>
                    <div role="form" class="wpcf7" id="wpcf7-f14-p39-o1" lang="en-US" dir="ltr">
                        <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p><ul></ul></div>
                        <form action="#" method="post" class="wpcf7-form init validate-form" novalidate="novalidate" data-status="init">
                            @csrf
                            <div class="form-lien-he">
                                <div class="row_1">
                                    <span class="wpcf7-form-control-wrap your-name">
                                        <input type="text" name="name" placeholder="Họ tên..." required size="40" class="wpcf7-form-control wpcf7-text wpcf7-name">
                                    </span><br>
                                    <span class="wpcf7-form-control-wrap your-email">
                                        <input type="email" name="email" placeholder="Email..." required size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email">
                                    </span>
                                    <div style="clear:both;"></div>
                                </div>
                                <div class="row_2">
                                    <span class="wpcf7-form-control-wrap your-phone">
                                        <input type="tel" name="phone" placeholder="Số Điện thoại..." required size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel">
                                    </span><br>
                                    <span class="wpcf7-form-control-wrap your-message">
                                        <textarea name="content" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Nội dung..."></textarea>
                                    </span>
                                    <div style="clear:both;"></div>
                                </div>
                                <p>
                                    <input type="button" value="GỬI ĐI" class="wpcf7-form-control wpcf7-submit button">
                                </p>
                            </div>
                            <div class="wpcf7-response-output hidden">Có một hoặc nhiều mục nhập có lỗi. Vui lòng kiểm tra và thử lại.</div>
                            <div class="wpcf7-response-success hidden">Cảm ơn bạn đã liên lạc với chúng tôi.</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="section_1663773892">
    <div class="bg section-bg fill bg-fill bg-loaded"></div>
    <div class="section-content relative">
        <div class="row ban-do" style="max-width:1280px" id="row-2093806391">
            <div id="col-1000140759" class="col small-12 large-12">
                <div class="col-inner text-center">
                    <p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.945377886091!2d108.19193271485776!3d16.01635868891358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421a2b90411917%3A0x502b7f176278aa42!2zNjIgQsOgdSBHaWEgVGjGsOG7o25nIDMsIEjDsmEgVGjhu40gxJDDtG5nLCBD4bqpbSBM4buHLCDEkMOgIE7hurVuZyA1NTAwMDA!5e0!3m2!1svi!2s!4v1645257129378!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="allowfullscreen" loading="lazy"></iframe>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('.wpcf7-submit').click(function (e) {
            e.preventDefault();
            $('.form-lien-he').removeClass('processing');
            var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
            var name = $('.wpcf7-name').val().trim();
            var email = $('.wpcf7-email').val().trim();
            if (name == "" || !pattern.test(email)) {
                $('.wpcf7-response-output').removeClass('hidden');
            } else {
                $('.wpcf7-response-output').addClass('hidden');
                $('.form-lien-he').addClass('processing');
                $.ajax({
                    type: 'post',
                    url: "{{ route('create-contact') }}",
                    data: $('.wpcf7-form').serialize(),
                    success: function (res) {
                        $('.form-lien-he').removeClass('processing');
                        $('.wpcf7-form')[0].reset()
                        $('.wpcf7-response-success').removeClass('hidden');
                        setTimeout(() => {
                            $('.wpcf7-response-success').addClass('hidden');
                        }, 3000);

                    },
                    error:function() { 
                        $('.form-lien-he').removeClass('processing');
                        $('.wpcf7-form')[0].reset()
                    }
                });
            }
           
        });
    });
</script>
@endsection