<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js js csstransforms3d csstransitions">
<head>
    <meta charset="UTF-8" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="xmlrpc.html" />
  
    <script>
      (function (html) {
        html.className = html.className.replace(/\bno-js\b/, 'js')
      })(document.documentElement);
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

    <link href="/css/home/app.min.css" rel="stylesheet">
    <link rel='stylesheet' id='flatsome-googlefonts-css'
    href='http://fonts.googleapis.com/css?family=Montserrat%3Aregular%2C700%2Cregular%2C600%2Cregular&amp;display=swap&amp;ver=3.9'
    type='text/css' media='all' />
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:bold,regular|Paytone%20One:bold,regular|Quicksand:bold,regular|Montserrat:bold,regular|Oswald:bold,regular|Roboto:bold,regular|Source%20Sans%20Pro:bold,regular&amp;display=swap" rel="stylesheet" type="text/css">
    <style id='wp-block-library-inline-css' type='text/css'>
        :root{--wp-admin-theme-color:#007cba;--wp-admin-theme-color-darker-10:#006ba1;--wp-admin-theme-color-darker-20:#005a87;--wp-admin-border-width-focus:2px}@media (-webkit-min-device-pixel-ratio:2),(min-resolution:192dpi){:root{--wp-admin-border-width-focus:1.5px}}:root .has-pale-pink-background-color{background-color:#f78da7}:root .has-vivid-red-background-color{background-color:#cf2e2e}:root .has-luminous-vivid-orange-background-color{background-color:#ff6900}:root .has-luminous-vivid-amber-background-color{background-color:#fcb900}:root .has-light-green-cyan-background-color{background-color:#7bdcb5}:root .has-vivid-green-cyan-background-color{background-color:#00d084}:root .has-pale-cyan-blue-background-color{background-color:#8ed1fc}:root .has-vivid-cyan-blue-background-color{background-color:#0693e3}:root .has-vivid-purple-background-color{background-color:#9b51e0}:root .has-white-background-color{background-color:#fff}:root .has-very-light-gray-background-color{background-color:#eee}:root .has-cyan-bluish-gray-background-color{background-color:#abb8c3}:root .has-very-dark-gray-background-color{background-color:#313131}:root .has-black-background-color{background-color:#000}:root .has-pale-pink-color{color:#f78da7}:root .has-vivid-red-color{color:#cf2e2e}:root .has-luminous-vivid-orange-color{color:#ff6900}:root .has-luminous-vivid-amber-color{color:#fcb900}:root .has-light-green-cyan-color{color:#7bdcb5}:root .has-vivid-green-cyan-color{color:#00d084}:root .has-pale-cyan-blue-color{color:#8ed1fc}:root .has-vivid-cyan-blue-color{color:#0693e3}:root .has-vivid-purple-color{color:#9b51e0}:root .has-white-color{color:#fff}:root .has-very-light-gray-color{color:#eee}:root .has-cyan-bluish-gray-color{color:#abb8c3}:root .has-very-dark-gray-color{color:#313131}:root .has-black-color{color:#000}:root .has-vivid-cyan-blue-to-vivid-purple-gradient-background{background:linear-gradient(135deg,#0693e3,#9b51e0)}:root .has-vivid-green-cyan-to-vivid-cyan-blue-gradient-background{background:linear-gradient(135deg,#00d084,#0693e3)}:root .has-light-green-cyan-to-vivid-green-cyan-gradient-background{background:linear-gradient(135deg,#7adcb4,#00d082)}:root .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background:linear-gradient(135deg,#fcb900,#ff6900)}:root .has-luminous-vivid-orange-to-vivid-red-gradient-background{background:linear-gradient(135deg,#ff6900,#cf2e2e)}:root .has-very-light-gray-to-cyan-bluish-gray-gradient-background{background:linear-gradient(135deg,#eee,#a9b8c3)}:root .has-cool-to-warm-spectrum-gradient-background{background:linear-gradient(135deg,#4aeadc,#9778d1 20%,#cf2aba 40%,#ee2c82 60%,#fb6962 80%,#fef84c)}:root .has-blush-light-purple-gradient-background{background:linear-gradient(135deg,#ffceec,#9896f0)}:root .has-blush-bordeaux-gradient-background{background:linear-gradient(135deg,#fecda5,#fe2d2d 50%,#6b003e)}:root .has-purple-crush-gradient-background{background:linear-gradient(135deg,#34e2e4,#4721fb 50%,#ab1dfe)}:root .has-luminous-dusk-gradient-background{background:linear-gradient(135deg,#ffcb70,#c751c0 50%,#4158d0)}:root .has-hazy-dawn-gradient-background{background:linear-gradient(135deg,#faaca8,#dad0ec)}:root .has-pale-ocean-gradient-background{background:linear-gradient(135deg,#fff5cb,#b6e3d4 50%,#33a7b5)}:root .has-electric-grass-gradient-background{background:linear-gradient(135deg,#caf880,#71ce7e)}:root .has-subdued-olive-gradient-background{background:linear-gradient(135deg,#fafae1,#67a671)}:root .has-atomic-cream-gradient-background{background:linear-gradient(135deg,#fdd79a,#004a59)}:root .has-nightshade-gradient-background{background:linear-gradient(135deg,#330968,#31cdcf)}:root .has-midnight-gradient-background{background:linear-gradient(135deg,#020381,#2874fc)}.has-small-font-size{font-size:.8125em}.has-normal-font-size,.has-regular-font-size{font-size:1em}.has-medium-font-size{font-size:1.25em}.has-large-font-size{font-size:2.25em}.has-huge-font-size,.has-larger-font-size{font-size:2.625em}.has-text-align-center{text-align:center}.has-text-align-left{text-align:left}.has-text-align-right{text-align:right}#end-resizable-editor-section{display:none}.aligncenter{clear:both}.items-justified-left{justify-content:flex-start}.items-justified-center{justify-content:center}.items-justified-right{justify-content:flex-end}.items-justified-space-between{justify-content:space-between}.screen-reader-text{border:0;clip:rect(1px,1px,1px,1px);-webkit-clip-path:inset(50%);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px;word-wrap:normal!important}.screen-reader-text:focus{background-color:#ddd;clip:auto!important;-webkit-clip-path:none;clip-path:none;color:#444;display:block;font-size:1em;height:auto;left:5px;line-height:normal;padding:15px 23px 14px;text-decoration:none;top:5px;width:auto;z-index:100000}
      </style>
    <script type='text/javascript' src="{{ asset('wp-includes/js/jquery/jquery.minaf6c.js') }}" id='jquery-core-js'></script>
    <script type='text/javascript' src="{{ asset('wp-includes/js/jquery/jquery-migrate.mind617.js') }}" id='jquery-migrate-js'></script>
    <script type='text/javascript' src="{{ asset('wp-includes/js/jquery/ui/core.min35d0.js') }}" id='jquery-ui-core-js'></script>
    <script type='text/javascript' src="{{ asset('wp-content/plugins/gallery-videos/JS/modernizr.customc8d8.js') }}"
    id='cwp-main-js'></script>
    <link rel="icon" href="/images/2021/10/cropped-Logo_genex_convertcircle-32x32.png" sizes="32x32" />
    <link rel="icon" href="/images/2021/10/cropped-Logo_genex_convertcircle-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="/images/2021/10/cropped-Logo_genex_convertcircle-180x180.png" />
    <style type='text/css'>
        @font-face {
          font-family: "fl-icons";
          font-display: block;
          src: url(/icons/fl-icons8af9.eot?v=3.15.3);
          src:
            url(/icons/fl-icons.eot#iefix?v=3.15.3) format("embedded-opentype"),
            url(/icons/fl-icons8af9.woff2?v=3.15.3) format("woff2"),
            url(/icons/fl-icons8af9.ttf?v=3.15.3) format("truetype"),
            url(/icons/fl-icons8af9.woff?v=3.15.3) format("woff"),
            url(/icons/fl-icons8af9.svg?v=3.15.3#fl-icons) format("svg");
        }
    </style>
    @yield('css')
</head>
<body id="body-site" data-rsssl=1 class="home page-template page-template-page-blank page-template-page-blank-php page page-id-1255 full-width lightbox nav-dropdown-has-arrow nav-dropdown-has-shadow">
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
<script type='text/javascript' id='flatsome-js-js-extra'>
    /* <![CDATA[ */
    var flatsomeVars = {
      "theme": {
        "version": "3.15.3"
      },
      "ajaxurl": "#",
      "rtl": "",
      "sticky_height": "70",
      "assets_url": "http:\/\/127.0.0.1:8001\/wp-content\/themes\/flatsome\/assets\/js\/",
      "lightbox": {
        "close_markup": "<button title=\"%title%\" type=\"button\" class=\"mfp-close\"><svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"28\" height=\"28\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-x\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"><\/line><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"><\/line><\/svg><\/button>",
        "close_btn_inside": false
      },
      "user": {
        "can_edit_pages": false
      },
      "i18n": {
        "mainMenu": "Main Menu"
      },
      "options": {
        "cookie_notice_version": "1",
        "swatches_layout": false,
        "swatches_box_select_event": false,
        "swatches_box_behavior_selected": false,
        "swatches_box_update_urls": "1",
        "swatches_box_reset": false,
        "swatches_box_reset_extent": false,
        "swatches_box_reset_time": 300,
        "search_result_latency": "0"
      }
    };
    /* ]]> */
  </script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/kk-star-ratings/src/core/public/js/kk-star-ratings.minbb49.js?ver=5.2.2') }}" id='kk-star-ratings-js'></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/dist/vendor/regenerator-runtime.minb36a.js?ver=0.13.7') }}" id='regenerator-runtime-js'></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0') }}" id='wp-polyfill-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/contact-form-7/includes/js/indexd03b.js?ver=5.5.1') }}" id='contact-form-7-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/tabs-responsive/assets/js/tabs-customc8d8.js?ver=5.8.3') }}" id='wpsm_tabs_r_custom-js-front-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/tabs-responsive/assets/js/bootstrapc8d8.js?ver=5.8.3') }}" id='wpsm_tabs_r_bootstrap-js-front-js'></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/hoverIntent.min73b9.js?ver=1.10.1') }}" id='hoverIntent-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/themes/flatsome/assets/js/flatsome0cdc.js') }}" id='flatsome-js-js'></script>
<script type='text/javascript' src="{{ asset('wp-includes/js/wp-embed.minc8d8.js?ver=5.8.3') }}" id='wp-embed-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/elfsight-contact-form-cc/assets/elfsight-contact-form254d.js?ver=2.3.1') }}" id='elfsight-contact-form-js'></script>
<script type='text/javascript' src="{{ asset('wp-content/plugins/elfsight-youtube-gallery-cc/assets/elfsight-youtube-gallery3b71.js?ver=3.5.0') }}" id='elfsight-youtube-gallery-js'></script>
<script type="text/javascript" src="/js/home/videopopup.js"></script>
<script async defer crossorigin="anonymous" type="text/javascript" src="/js/home/app.min.js"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=585723972044551&autoLogAppEvents=1" nonce="2spNzV4z"></script>
@yield('js')
</body>
</html>
