@extends('home.layouts.app')

@section('title', $cateogry['name'])

@section('content')
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
<div class="shop-page-title category-page-title page-title ">
    <div class="page-title-inner flex-row  medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-large">
                <div class="banner-page-shop">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home" style="padding-right: 5px;"></i>
                            <a id="mauchungbread" href="{{ route('index') }}" data-wpel-link="internal">Trang chủ</a>
                        </li>
                        <li>\</li>
                        <li style="color: #333;">
                            {{ $cateogry['name'] }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row category-page-row">
    <div class="col large-12">
        <div class="review-danhmuc">
            <h2>Giới thiệu {{ $cateogry['name'] }}</h2>
        </div>
        <div></div>
        <div class="box-product-list"></div>
        <div class="shop-container">
            @if ($postList)
            <div class="products row row-small large-columns-4 medium-columns-4 small-columns-2">
                @foreach ($postList as $item)
                    <div class="product-small col has-hover product type-product post-1797 status-publish first instock product_cat-san-pham-khac has-post-thumbnail shipping-taxable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1"></div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="{{ route('detail-post', ['tin-tuc', $cateogry['slug'], $item['slug']]) }}" data-wpel-link="internal">
                                            <img width="247" style="height: 296px;" height="296" src="{{ asset($item['image'] ?? 'wp-content/uploads/2020/11/not-found-image.png') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{ $item['name'] }}" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover"></div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover"></div>
                                </div>
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title woocommerce-loop-product__title">
                                            <a href="{{ route('detail-post', ['tin-tuc', $cateogry['slug'], $item['slug']]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" data-wpel-link="internal">{{ $item['name'] }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $postList->links('home.includes.pagination') }}
            @else

            @endif
            
        </div>
    </div>
</div>
@endsection
