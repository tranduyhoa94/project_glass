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
<div id="content" class="blog-wrapper blog-single page-wrapper">
    <div class="row row-large ">
        <div class="large-9 col">
            <div class="article-inner">
                <header class="entry-header">
                    <div class="entry-header-text entry-header-text-top text-left">
                        <div class="banner-page-shop">
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-home" style="padding-right: 5px;"></i>
                                    <a id="mauchungbread" href="{{ route('index') }}" data-wpel-link="internal">Trang chủ</a>
                                </li>
                                <li>\</li>
                                <li style="color: #333;">
                                    <ul class="post-categories">
                                        <li>
                                            <a href="#" rel="category tag" data-wpel-link="internal">Công trình nổi bật</a>
                                        </li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                        <h1 class="entry-title">{{ $post['name'] }}</h1>
                        <div class="entry-divider is-divider small"></div>
                    </div>
                </header>
                <div class="entry-content single-page">
                    <h2><strong>Thông tin công trình</strong></h2>
                </div>
            </div>
            @include('home.build.build-same')
        </div>
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
    </div>
</div>
@endsection
@section('js')
@endsection