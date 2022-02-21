<!DOCTYPE html>
<html lang="{{session('locale', $config->locale)}}" data-theme="{{session('theme', $config->theme)}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="XrscSqm4bh48Nw0IZhyH-JO52qXBf45BcSy5xigkL2Y" />
    <meta property="og:image" content="@yield('cover', '/images/home/logo-white.png')"/>
    <meta property="og:image:alt" content="@yield('cover', '/images/home/logo-white.png')"/>
    <meta name="twitter:image" content="@yield('cover', '/images/home/logo-white.png')"/>
    <meta property="og:url" content=" {{  Request::url() }} "/>
    <meta property="og:type" content=" {{  Request::url() }} "/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @isset($seo)
        <title>{{$seo->title}}</title>
        <meta name="description" content="{{$seo->description}}">
        <meta property="og:title" content="{{$seo->description}}">
        <meta property="og:description" content="{{$seo->description}}">
        <meta name="robots" content="{{$seo->robots}}" />
    @else
        <title>@yield('title') </title>
        <meta property="og:title" content="@yield('title')">
        <meta property="og:description" content="@yield('description')">
        <meta name="description" content="@yield('description') ">
    @endif
    @cms
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/images/admin/favicon.png">
    
    <link rel="canonical" href="{{request()->url()}}">
    <link rel='stylesheet' id='flatsome-googlefonts-css'  href='http://fonts.googleapis.com/css?family=Roboto%3Aregular%2C700%2Cregular%2C700%2Cregular&amp;display=swap&amp;ver=3.9' type='text/css' media='all' />
    {{-- <link rel='stylesheet' id='dashicons-css'  href="{{ asset('wp-includes/css/dashicons.min3bea.css?ver=5.6.7') }}" type='text/css' media='all' /> --}}
    <link rel='stylesheet' id='menu-icons-extra-css'  href="{{ asset('wp-content/plugins/ot-flatsome-vertical-menu/libs/menu-icons/css/extra.min9fd1.css?ver=0.12.2') }}" type='text/css' media='all' />
    {{-- <link rel='stylesheet' id='wp-block-library-css'  href="{{ asset('wp-includes/css/dist/block-library/style.min3bea.css?ver=5.6.7') }}" type='text/css' media='all' /> --}}
    {{-- <link rel='stylesheet' id='a-z-listing-block-css'  href="{{ asset('wp-content/plugins/a-z-listing/css/a-z-listing-defaultae82.css?ver=4.2.0') }}" type='text/css' media='all' /> --}}
    {{-- <link rel='stylesheet' id='menu-image-css'  href="{{ asset('wp-content/plugins/menu-image/includes/css/menu-image8d18.css?ver=3.0.5') }}" type='text/css' media='all' /> --}}
    {{-- <link rel='stylesheet' id='contact-form-7-css'  href="{{ asset('wp-content/plugins/contact-form-7/includes/css/styles7661.css?ver=5.4.2') }}" type='text/css' media='all' /> --}}
    {{-- <link rel='stylesheet' id='devvn-quickbuy-style-css'  href="{{ asset('wp-content/plugins/devvn-quick-buy/css/devvn-quick-buy784e.css?ver=2.1.6') }}" type='text/css' media='all' /> --}}
    <link rel='stylesheet' id='ot-vertical-menu-css-css'  href="{{ asset('wp-content/plugins/ot-flatsome-vertical-menu/assets/css/style9632.css?ver=1.2.3') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='uaf_client_css-css'  href="{{ asset('wp-content/uploads/useanyfont/uaf4402.css?ver=1644937321') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='wonderplugin-3dcarousel-style-css'  href="{{ asset('wp-content/plugins/wonderplugin-3dcarousel-trial/engine/wonderplugin3dcarousel7868.css?ver=3.9') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-icons-css'  href="{{ asset('wp-content/themes/flatsome/assets/css/fl-iconsae34.css?ver=3.12') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-main-css'  href="{{ asset('wp-content/themes/flatsome/assets/css/flatsome2916.css?ver=3.13.1') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-shop-css'  href="{{ asset('wp-content/themes/flatsome/assets/css/flatsome-shop2916.css?ver=3.13.1') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-style-css'  href="{{ asset('wp-content/themes/ecom-child/style6aec.css?ver=3.0') }}" type='text/css' media='all' />
    {{-- <link rel='stylesheet' id='a-z-listing-css'  href="{{ asset('wp-content/plugins/a-z-listing/css/a-z-listing-defaultae82.css?ver=4.2.0') }}" type='text/css' media='all' /> --}}
    <style id='font-awesome-official-v4shim-inline-css' type='text/css'>
        @font-face {
        font-family: "FontAwesome";
        font-display: block;
        src: url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-brands-400.eot"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-brands-400.eot?#iefix") format("embedded-opentype"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-brands-400.woff2") format("woff2"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-brands-400.woff") format("woff"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-brands-400.ttf") format("truetype"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-brands-400.svg#fontawesome") format("svg");
        }
        
        @font-face {
        font-family: "FontAwesome";
        font-display: block;
        src: url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-solid-900.eot"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-solid-900.eot?#iefix") format("embedded-opentype"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-solid-900.woff2") format("woff2"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-solid-900.woff") format("woff"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-solid-900.ttf") format("truetype"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-solid-900.svg#fontawesome") format("svg");
        }
        
        @font-face {
        font-family: "FontAwesome";
        font-display: block;
        src: url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-regular-400.eot"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-regular-400.eot?#iefix") format("embedded-opentype"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-regular-400.woff2") format("woff2"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-regular-400.woff") format("woff"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-regular-400.ttf") format("truetype"),
                url("https://use.fontawesome.com/releases/v5.15.1/webfonts/fa-regular-400.svg#fontawesome") format("svg");
        unicode-range: U+F004-F005,U+F007,U+F017,U+F022,U+F024,U+F02E,U+F03E,U+F044,U+F057-F059,U+F06E,U+F070,U+F075,U+F07B-F07C,U+F080,U+F086,U+F089,U+F094,U+F09D,U+F0A0,U+F0A4-F0A7,U+F0C5,U+F0C7-F0C8,U+F0E0,U+F0EB,U+F0F3,U+F0F8,U+F0FE,U+F111,U+F118-F11A,U+F11C,U+F133,U+F144,U+F146,U+F14A,U+F14D-F14E,U+F150-F152,U+F15B-F15C,U+F164-F165,U+F185-F186,U+F191-F192,U+F1AD,U+F1C1-F1C9,U+F1CD,U+F1D8,U+F1E3,U+F1EA,U+F1F6,U+F1F9,U+F20A,U+F247-F249,U+F24D,U+F254-F25B,U+F25D,U+F267,U+F271-F274,U+F279,U+F28B,U+F28D,U+F2B5-F2B6,U+F2B9,U+F2BB,U+F2BD,U+F2C1-F2C2,U+F2D0,U+F2D2,U+F2DC,U+F2ED,U+F328,U+F358-F35B,U+F3A5,U+F3D1,U+F410,U+F4AD;
        }
    </style>
    <script type='text/javascript' src="{{ asset('wp-includes/js/jquery/jquery.min9d52.js?ver=3.5.1') }}" id='jquery-core-js'></script>
    <script type='text/javascript' src="{{ asset('wp-includes/js/jquery/jquery-migrate.mind617.js?ver=3.3.2') }}" id='jquery-migrate-js'></script>
    <script type='text/javascript' src="{{ asset('wp-content/plugins/wonderplugin-3dcarousel-trial/engine/wp3dcarousellightbox7868.js?ver=3.9') }}" id='wonderplugin-3dcarousel-lightbox-script-js'></script>
    <script type='text/javascript' src="{{ asset('wp-content/plugins/wonderplugin-3dcarousel-trial/engine/wonderplugin3dcarousel7868.js?ver=3.9') }}" id='wonderplugin-3dcarousel-script-js'></script>
    <!-- Custom CSS -->
    <style type="text/css" id="wp-custom-css">
        .form-lienhe 
input[type='search'], input[type='number'], input[type='email'], input[type='tel'], input[type='text'], textarea{
border:1px solid #386531;
}

.form-lienhe input[type='submit']
{
background:#d4a86e !important;
display:block;
margin: -54px auto;
margin-right: 1px;
}
.form-lienhe input[type="text"]::placeholder:{
font-family: FontAwesome;
content: "\f007";
}
/* Điều chỉnh khoảng các giữa các đoạn văn*/
p {
margin-bottom: 7px;
}
.wpcf7 .form-lien-he h2{
color:white;
padding-top:1.8rem;
margin-bottom:0!important;
font-family:TimesNewRoman;
}
.wpcf7 .form-lien-he p.wpcf7_des{
color:white;
margin-bottom:1rem;
padding-bottom:1rem;
font-weight:700;
} 
.row_1{
margin:0 auto;
}
.wpcf7 .form-lien-he .row_1 span{
width:50%;
float:left;
padding:0 10px;
}
.wpcf7 .form-lien-he .row_2 span{
width:50%;
float:left;
padding:0 10px;
}
.wpcf7 .form-lien-he .row_2 textarea{
padding-top: 0.5em;
    min-height:50px;
    background: #c0bebe38;
border:none;
color:black;
resize:none;
border-radius:0 20px 20px 0;
}
.form-lien-he input{
background: #c0bebe38;
border:none;
height:50px;
color:black;
}
.form-lien-he .your-name input{
border-radius:20px 0 0 20px;
}
.form-lien-he .your-email input{
border-radius:0 20px 20px 0;
}
.form-lien-he .your-phone input{
border-radius:20px 0 0 20px;
}
.form-lien-he .button{
border-radius:20px;
padding:0 4.5rem;
margin-top:1rem;
}
h2.title-main~p{
text-align:center;
}
.ss-congtrinh .section-bg.bg-loaded {
background-image: url(wp-content/uploads/2021/01/bg-cong-trinh.jpg);
}
.ss-tuvan .section-bg.bg-loaded {
background-image: url(wp-content/uploads/2020/11/contact_form.png);
}

@media only screen and (max-width: 48em) {

.mfp-content .sidebar-menu .nav-sidebar .html{
    display:block;
    padding: 0;
}
    .mfp-content .sidebar-menu .nav-sidebar .html .menu-topbar{
    display: block;
}
    .mfp-content .sidebar-menu .nav-sidebar .html .menu-topbar li{
        padding-left: 0;
}
.mfp-content .sidebar-menu .nav-sidebar .html .menu-topbar li a{
        padding: 12px 20px !important;
        border-bottom: 1px solid #ececec;
    }
}

    .wpf-center {
    margin-left: auto !important;
    margin-right: auto !important;
    }
    .wpf-center .wpforms-head-container, 
    .wpf-center .wpforms-submit-container {
    text-align: center; 
    }		
</style>
    <link href="/css/home/app.min.css" rel="stylesheet">
    
    <!-- Google Tag Manager -->
    @yield('css')
</head>
<body data-rsssl=1 class="home page-template page-template-page-blank page-template-page-blank-php page page-id-2 theme-flatsome ot-vertical-menu ot-overplay full-width lightbox nav-dropdown-has-arrow nav-dropdown-has-shadow nav-dropdown-has-border mobile-submenu-slide mobile-submenu-slide-levels-1 mobile-submenu-toggle elementor-default elementor-kit-17064">
<a class="skip-link screen-reader-text" href="#main">Skip to content</a>
<div id="wrapper">
    {{-- app header --}}
    @include('home.includes.header')
    <main id="main" class="">
        <div id="content" role="main" class="content-area">
            @yield('content')
        </div>
    </main>
    @include('home.includes.footer')
</div>

<script src="/js/home/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script async defer crossorigin="anonymous" type="text/javascript" src="/js/home/app.min.js"></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/dist/vendor/wp-polyfill.min89b1.js?ver=7.4.4') }}" id='wp-polyfill-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/contact-form-7/includes/js/index7661.js?ver=5.4.2') }}" id='contact-form-7-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/devvn-quick-buy/js/jquery.validate.min784e.js?ver=2.1.6') }}" id='jquery.validate-js'></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/underscore.min4511.js?ver=1.8.3') }}" id='underscore-js'></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/wp-util.min3bea.js?ver=5.6.7') }}" id='wp-util-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/devvn-quick-buy/js/devvn-quick-buy784e.js?ver=2.1.6') }}" id='devvn-quickbuy-script-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/ot-flatsome-vertical-menu/assets/vendor/superfish/hoverIntent9632.js?ver=1.2.3') }}" id='ot-hoverIntent-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/ot-flatsome-vertical-menu/assets/vendor/superfish/superfish.min9632.js?ver=1.2.3') }}" id='ot-superfish-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/ot-flatsome-vertical-menu/assets/js/ot-vertical-menu.min9632.js?ver=1.2.3') }}" id='ot-vertical-menu-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/themes/flatsome/inc/extensions/flatsome-live-search/flatsome-live-search2916.js?ver=3.13.1') }}" id='flatsome-live-search-js'></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/hoverIntent.minc245.js?ver=1.8.1') }}" id='hoverIntent-js'></script>
<script type='text/javascript' id='flatsome-js-js-extra'>
/* <![CDATA[ */
var flatsomeVars = {
	"ajaxurl":"#",
	"rtl":"","sticky_height":"78",
	"lightbox":
	{"close_markup":"<button title=\"%title%\" type=\"button\" class=\"mfp-close\"><svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"28\" height=\"28\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-x\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"><\/line><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"><\/line><\/svg><\/button>","close_btn_inside":false},
		"user":{"can_edit_pages":false},
		"i18n":{"mainMenu":"Main Menu"},
		"options":{"cookie_notice_version":"1"}
	};
/* ]]> */
</script>
<script type='text/javascript' src="{{ asset('wp-content/themes/flatsome/assets/js/flatsome2916.js?ver=3.13.1') }}" id='flatsome-js-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/themes/flatsome/assets/js/woocommerce2916.js?ver=3.13.1') }}" id='flatsome-theme-woocommerce-js-js'></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/wp-embed.min3bea.js?ver=5.6.7') }}" id='wp-embed-js'></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=585723972044551&autoLogAppEvents=1" nonce="2spNzV4z"></script>
@yield('js')
</body>
</html>
