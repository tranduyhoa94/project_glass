@extends('home.layouts.app')

@section('title', __('Digital Marketing'))

@section('content')

<div class="page-wrapper page-digital">
    {{-- Block hero --}}
    <div class="grid-hero" id="grid-hero">
        <div class="container">
            <div class="grid-hero-bg">
                <div class="row">
                    <div class="col-11 col-md-8 col-lg-7 col-xl-6">
                        <div class="grid-hero__wrapp">
                            <div class="grid-hero__content">
                                <div class="box-hero">
                                    <h2 class="title" data-cms="{{app()->getLocale()}}-digital-index-9">DIGITAL MARKETING <br> SOLUTION</h2>
                                    <h4 class="sub" data-cms="{{app()->getLocale()}}-digital-index-10">MINIMUM ADVERTISMENT - MAXIMUM SALES</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Block call --}}
    <div class="grid-call grid-call--digital grid-style--arrowdown">
        <div class="container">
            <div class="box-call">
                <div class="sapo">
                    <p data-cms="{{app()->getLocale()}}-digital-index-15">Digital Marketing is the perfect solution to promote your brand, products và and services to the potential customers. In this digital age, marketing has became easier, but the effect that it brought is undeniable. ShopGroup's digital marketing solution is a smart choice that will make your business breakthrough.</p>
                </div>
                <div class="btn-normal">
                    <a class="btn-modal" href="javascript:void(0)" title="Register now">
                        <span class="btn-normal__title" data-cms="{{app()->getLocale()}}-digital-index-18">Register now</span>
                        <svg class="icon"><use xlink:href="#icon-arrow"></use></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Block Logo block 1 --}}
    <div class="grid-marketing">
        <div class="container">
            <div class="grid-head">
                <h2 class="title" data-cms="{{app()->getLocale()}}-digital-index-24">MAIN MARKETING <br> SOLUTIONS</h2>
                <div class="sapo">
                    <p data-cms="{{app()->getLocale()}}-digital-index-26">The competition is getting harder every single day, so do not let yourself left behind.</p>
                    <p data-cms="{{app()->getLocale()}}-digital-index-27">Let us be partner and together will conquer the world.</p>
                </div>
            </div>
            <div class="grid-content">

                {{-- Item 1 --}}
                <div class="box-marketing">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-5 d-flex align-items-center">
                            <div class="box-marketing__img">
                                <img class="img-fluid" @src="/images/home/gg-ads.png" alt="Google ads" data-cms="{{app()->getLocale()}}-digital-index-33">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 offset-lg-1">
                            <div class="box-marketing__content">
                                <h3 class="box-marketing__title"><span data-cms="{{app()->getLocale()}}-digital-index-37">Google ads</span></h3>
                                <div class="box-marketing__sapo" data-cms="{{app()->getLocale()}}-digital-index-38">Google Ads is a potential solution for many businesses. ShopGroup is highly specialized of ultilizing Google Ads to bring the best result.</div>
                                <ul class="support-list">
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-43">Advertisment using Google Ads is a trend nowaday and it will bring unimaginable profit.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-47">With Google's smart and easy Ads, you can reach more relevant customers.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-51">The more visitor counts increasing, the more order come from Google Adwords.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-55">Decrease the cost of advertisment, meet KPI standard and efficently run your business</div>
                                    </li>
                                </ul>
                                <div class="btn-normal">
                                    <a class="btn-modal" href="javascript:void(0)" title="Register now">
                                        <span class="btn-normal__title" data-cms="{{app()->getLocale()}}-digital-index-58">Register now</span>
                                        <svg class="icon"><use xlink:href="#icon-arrow"></use></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Item 2 --}}
                <div class="box-marketing box-marketing--imageRight">
                    <div class="row">

                        <div class="col-12 col-md-12 col-lg-5 d-flex align-items-center">
                            <div class="box-marketing__img">
                                <img class="img-fluid" @src="/images/home/face-ads.png" alt="Facebook ads" data-cms="{{app()->getLocale()}}-digital-index-65">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 offset-lg-1">
                            <div class="box-marketing__content">
                                <h3 class="box-marketing__title"><span data-cms="{{app()->getLocale()}}-digital-index-69">FACEBOOK ADS</span></h3>
                                <div class="box-marketing__sapo" data-cms="{{app()->getLocale()}}-digital-index-70">Google Ads is a potential solution for many businesses. ShopGroup is highly specialized of ultilizing Google Ads to bring the best result.</div>
                                <ul class="support-list">
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-75">Advertisment using Google Ads is a trend nowaday and it will bring unimaginable profit.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-79">With Google's smart and easy Ads, you can reach more relevant customers.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-83">The more visitor counts increasing, the more order come from Google Adwords.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-87">Decrease the cost of advertisment, meet KPI standard and efficently run your business</div>
                                    </li>
                                </ul>
                                <div class="btn-normal">
                                    <a class="btn-modal" href="javascript:void(0)" title="Register now">
                                        <span class="btn-normal__title" data-cms="{{app()->getLocale()}}-digital-index-90">Register now</span>
                                        <svg class="icon"><use xlink:href="#icon-arrow"></use></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Item 3 --}}
                <div class="box-marketing">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-5 d-flex align-items-center">
                            <div class="box-marketing__img">
                                <img class="img-fluid" @src="/images/home/seo-service.png" alt="Google ads" data-cms="{{app()->getLocale()}}-digital-index-97">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 offset-lg-1">
                            <div class="box-marketing__content">
                                <h3 class="box-marketing__title"><span data-cms="{{app()->getLocale()}}-digital-index-101">SEO SERIVES</span></h3>
                                <div class="box-marketing__sapo" data-cms="{{app()->getLocale()}}-digital-index-102">Google Ads is a potential solution for many businesses. ShopGroup is highly specialized of ultilizing Google Ads to bring the best result.</div>
                                <ul class="support-list">
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-107">Advertisment using Google Ads is a trend nowaday and it will bring unimaginable profit.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-111">With Google's smart and easy Ads, you can reach more relevant customers.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-115">The more visitor counts increasing, the more order come from Google Adwords.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-119">Decrease the cost of advertisment, meet KPI standard and efficently run your business</div>
                                    </li>
                                </ul>
                                <div class="btn-normal">
                                    <a class="btn-modal" href="javascript:void(0)" title="Register now">
                                        <span class="btn-normal__title" data-cms="{{app()->getLocale()}}-digital-index-122">Register now</span>
                                        <svg class="icon"><use xlink:href="#icon-arrow"></use></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Item 4 --}}
                <div class="box-marketing box-marketing--imageRight">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-5 d-flex align-items-center">
                            <div class="box-marketing__img">
                                <img class="img-fluid" @src="/images/home/content-writing.png" alt="Facebook ads" data-cms="{{app()->getLocale()}}-digital-index-129">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 offset-lg-1">
                            <div class="box-marketing__content">
                                <h3 class="box-marketing__title"><span data-cms="{{app()->getLocale()}}-digital-index-133">CONTENT WRITING SERVICE</span></h3>
                                <div class="box-marketing__sapo" data-cms="{{app()->getLocale()}}-digital-index-134">Google Ads is a potential solution for many businesses. ShopGroup is highly specialized of ultilizing Google Ads to bring the best result.</div>
                                <ul class="support-list">
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-139">Advertisment using Google Ads is a trend nowaday and it will bring unimaginable profit.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-143">With Google's smart and easy Ads, you can reach more relevant customers.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-147">The more visitor counts increasing, the more order come from Google Adwords.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-151">Decrease the cost of advertisment, meet KPI standard and efficently run your business</div>
                                    </li>
                                </ul>
                                <div class="btn-normal">
                                    <a class="btn-modal" href="javascript:void(0)" title="Register now">
                                        <span class="btn-normal__title" data-cms="{{app()->getLocale()}}-digital-index-154">Register now</span>
                                        <svg class="icon"><use xlink:href="#icon-arrow"></use></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Item5 --}}
                <div class="box-marketing">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-5 d-flex align-items-center">
                            <div class="box-marketing__img">
                                <img class="img-fluid" @src="/images/home/website-fanpage.png" alt="Google ads" data-cms="{{app()->getLocale()}}-digital-index-161">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 offset-lg-1">
                            <div class="box-marketing__content">
                                <h3 class="box-marketing__title"><span data-cms="{{app()->getLocale()}}-digital-index-165">WEBSITE, FANPAGE MAINTAINANCE</span></h3>
                                <div class="box-marketing__sapo" data-cms="{{app()->getLocale()}}-digital-index-166">Google Ads is a potential solution for many businesses. ShopGroup is highly specialized of ultilizing Google Ads to bring the best result.</div>
                                <ul class="support-list">
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-171">Advertisment using Google Ads is a trend nowaday and it will bring unimaginable profit.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-175">With Google's smart and easy Ads, you can reach more relevant customers.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-179">The more visitor counts increasing, the more order come from Google Adwords.</div>
                                    </li>
                                    <li>
                                        <svg class="icon"><use xlink:href="#icon-plus"></use></svg>
                                        <div class="text" data-cms="{{app()->getLocale()}}-digital-index-183">Decrease the cost of advertisment, meet KPI standard and efficently run your business</div>
                                    </li>
                                </ul>
                                <div class="btn-normal">
                                    <a class="btn-modal" href="javascript:void(0)" title="Register now">
                                        <span class="btn-normal__title" data-cms="{{app()->getLocale()}}-digital-index-186">Register now</span>
                                        <svg class="icon"><use xlink:href="#icon-arrow"></use></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Block contact --}}
    @include('home.includes.contact')

    {{-- Block action --}}
    @include('home.includes.consultation')
</div>

@endsection
