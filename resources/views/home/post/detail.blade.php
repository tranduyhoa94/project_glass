@extends('home.layouts.app')

@section('title', $post->name)
@section('cover', url($post->image))
@section('css')
<style>
    .text-danger {
        color: red;
    }
    .text-success {
        color: green;
    }
	.banner-page-shop .breadcrumb {
		display: inline-flex;
		margin-bottom:0;
	}
	.banner-page-shop .breadcrumb ul{
		margin:0;
	}
	.banner-page-shop .breadcrumb li {
		z-index: 22;
		padding: 0 10px 0 0;
		list-style:none;
		color: #000000;
		margin-left:0;
		text-transform: capitalize;
	}
	.banner-page-shop .breadcrumb li:nth-of-type(1)  {
		font-weight:bold;
	}
	.banner-page-shop .breadcrumb li:nth-of-type(1)  a{
		color:#000000;
	}
	.banner-page-shop{
		text-align:left;
	}
	@media only screen and (max-width: 48em) {
			.banner-page-shop .breadcrumb li a{
		font-size:13px;
	}
	}
    a.devvn_buy_now_style {
    display: inline-block;
    overflow: hidden;
    clear: both;
    padding: 9px 0;
    border-radius: 4px;
    font-size: 18px;
    line-height: normal;
    text-transform: uppercase;
    color: #fff!important;
    text-align: center;
    background: #fd6e1d;
    background: -webkit-gradient(linear,0% 0%,0% 100%,from(#fd6e1d),to(#f59000));
    background: -webkit-linear-gradient(top,#f59000,#fd6e1d);
    background: -moz-linear-gradient(top,#f59000,#fd6e1d);
    background: -ms-linear-gradient(top,#f59000,#fd6e1d);
    background: -o-linear-gradient(top,#f59000,#fd6e1d);
    margin: 0 0 20px;
    text-decoration: none;
    border-bottom: 0!important;
    max-width: 350px;
    width: 100%;
}
</style>
@endsection
@section('content')
<div id="product-305" class="product type-product post-305 status-publish first instock product_cat-cua-kinh product_cat-cua-kinh-noi-bat has-post-thumbnail shipping-taxable product-type-simple">
	<div class="row content-row row-divided row-large row-reverse">
        <div id="product-sidebar" class="col large-3 hide-for-medium shop-sidebar ">
            <aside id="woocommerce_products-15" class="widget woocommerce widget_products">
                <span class="widget-title shop-sidebar">Bài viết mới</span>
                <div class="is-divider small"></div>
                <ul class="product_list_widget">
                    @if($newPost)
                        @foreach ($newPost as $item)
                            <li>
                                <a href="{{ route('detail-post', ['tin-tuc', $item['category'][0]['slug'], $item['slug']]) }}" data-wpel-link="internal">
                                    <img width="100" height="100" style="width:100px;height=100px;" src="{{ asset($item['image']) }}" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="{{ $item['name'] }}" loading="lazy" sizes="(max-width: 100px) 100vw, 100px">
                                    <span class="product-title">{{ $item['name'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </aside>
		</div>
        <div class="col large-9">
            <div class="product-main">
                <div class="row">
                    <div class="large-6 col">
                        <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 1;">
                            <figure class="zoom">
                                <div class="flickity-viewport" style="height: 574.5px; touch-action: pan-y;">
                                    <div class="flickity-slider" style="left: 0px; transform: translateX(0%);">
                                        <div  id="img-container" class="woocommerce-product-gallery__image slide first is-selected" style="position: absolute; left: 0%">
                                            <img style="width: 510px; height: 680px;" width="510" height="680" src="{{ asset($post['image']) }}" class="wp-post-image skip-lazy" loading="lazy">
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                    <div class="product-info summary entry-summary col col-fit product-summary form-flat">
                        <div class="banner-page-shop">
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-home" style="padding-right: 5px;"></i>
                                    <a id="mauchungbread" href="{{ route('index') }}" data-wpel-link="internal">Trang chủ</a>
                                </li>
                                <li>\</li>
                                <li style="color: #333;">
                                    <a href="{{ route('post-category', ['tin-tuc', $cateogry['slug']]) }}" rel="tag" data-wpel-link="internal">{{ $cateogry['name'] }}</a>,
                                </li>
                            </ol>
                        </div>
                        <nav class="woocommerce-breadcrumb breadcrumbs uppercase"></nav>
                        <h1 class="product-title product_title entry-title">{{ $post->name }}</h1>
                        <div class="is-divider small"></div>
                        <div class="product-short-description">
                            {!! $post->sort_description !!}
                        </div>
                        <div class="scroll-a">
                            <a href="#review_form" class="devvn_buy_now_style" data-wpel-link="internal">
                                <strong>Đăng kí nhận báo giá</strong>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="product-footer">
                <div class="woocommerce-tabs wc-tabs-wrapper container tabbed-content">
                    <ul class="tabs wc-tabs product-tabs small-nav-collapse nav nav-uppercase nav-line nav-left" role="tablist">
                        <li class="description_tab active" id="tab-title-description" role="tab" aria-controls="tab-description">
                            <a href="#tab-description">Thông tin sản phẩm</a>
                        </li>
		            </ul>
                    <div class="tab-panels">
                        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content active" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" style="">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
                <div id="review_form_wrapper">
                    <div id="review_form" class="col-inner review_form">
                        <div class="review-form-inner has-border">
                            <div id="respond" class="comment-respond">
                                <h3 id="reply-title" class="comment-reply-title">Nhận báo giá: </h3>
                                <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                                    @csrf
                                    <p class="content-form-content">
                                        <label for="content">Nội Dung
                                            <span class="required">*</span>
                                        </label>
                                        <textarea id="client-content" name="content" cols="45" rows="8" required=""></textarea>
                                    </p>
                                    <p class="content-form-author">
                                        <label for="author">Tên
                                            <span class="required">*</span>
                                        </label>
                                        <input id="client-name" name="name" type="text" value="" size="30" required="">
                                    </p>
                                    <p class="content-form-email">
                                        <label for="email">Email
                                            <span class="required">*</span>
                                        </label>
                                        <input id="client-email" name="email" type="email" value="" size="30" required="">
                                    </p>
                                    <div class="anr_captcha_field">
                                        <div id="anr_captcha_field_1" class="anr_captcha_field_div"></div>
                                    </div>
                                    <p class="form-submit">
                                        <input name="submit" type="button" id="submit" class="submit" value="Gửi đi">
                                        <input name="post_name" type="hidden" value="{{ $post->name }}">
                                    </p>
                                </form>
                                <div class="wpcf7-response-output hidden text-danger">Có một hoặc nhiều mục nhập có lỗi. Vui lòng kiểm tra và thử lại.</div>
                                <div class="wpcf7-response-success hidden text-success">Nhận báo giá thành công.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('home.post.post-same')
@endsection
@section('js')
<script>
    $('.submit').click(function (e) {
            e.preventDefault();
            var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
            var name = $('#client-name').val().trim();
            var email = $('#client-email').val().trim();
            var content = $('#client-content').val().trim();
            if (name == "" || !pattern.test(email) || content == "") {
                $('.wpcf7-response-output').removeClass('hidden');
            } else {
                $('.wpcf7-response-output').addClass('hidden');
                $.ajax({
                    type: 'post',
                    url: "{{ route('create-contact') }}",
                    data: $('#commentform').serialize(),
                    success: function (res) {
                        $('#commentform')[0].reset()
                        $('.wpcf7-response-success').removeClass('hidden');
                        setTimeout(() => {
                            $('.wpcf7-response-success').addClass('hidden');
                        }, 3000);

                    },
                    error:function() { 
                        $('#commentform')[0].reset()
                    }
                });
            }
        });
</script>
@endsection
