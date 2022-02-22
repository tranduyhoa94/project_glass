@extends('home.layouts.app')

@section('title', $post->name)
@section('cover', url($post->image))
@section('css')
<style>
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
</style>
@endsection
@section('content')
<div id="product-305" class="product type-product post-305 status-publish first instock product_cat-cua-kinh product_cat-cua-kinh-noi-bat has-post-thumbnail shipping-taxable product-type-simple">
	<div class="row content-row row-divided row-large row-reverse">
	<div id="product-sidebar" class="col large-3 hide-for-medium shop-sidebar ">
		<aside id="woocommerce_products-15" class="widget woocommerce widget_products">
            <span class="widget-title shop-sidebar">Sản phẩm nổi bật</span>
            <div class="is-divider small"></div>
            <ul class="product_list_widget">
                <li>
                    <a href="../cua-nhom-jma/index.html" data-wpel-link="internal">
                        <img width="100" height="100" src="../../wp-content/uploads/2022/02/cong-trinh-cua-nhom-jma-tan-phu-tphcm-10-100x100.jpg" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="Báo giá cửa nhôm JMA nhập khẩu chính hãng 100% giá tốt 2022" loading="lazy" srcset="https://phucdatdoor.vn/wp-content/uploads/2022/02/cong-trinh-cua-nhom-jma-tan-phu-tphcm-10-100x100.jpg 100w, https://phucdatdoor.vn/wp-content/uploads/2022/02/cong-trinh-cua-nhom-jma-tan-phu-tphcm-10-280x280.jpg 280w" sizes="(max-width: 100px) 100vw, 100px">
                        <span class="product-title">Cửa nhôm JMA</span>
                    </a>
                </li>
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
                        <a href="javascript:void(0);" class="devvn_buy_now devvn_buy_now_style" data-id="305" data-wpel-link="internal">
                            <strong>Đăng kí nhận báo giá</strong>
                            <span></span>
                        </a>
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function copy(id) {
        /* Get the text field */
        var copyText = document.getElementById(id);
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(copyText.value).select();
        document.execCommand("copy");
        $temp.remove();
    }

</script>
@endsection
