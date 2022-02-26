<style>
.gap-1859923817 {
    padding-top: 30px;
}
.section_791233928 {
    padding-top: 30px;
    padding-bottom: 30px;
    margin-bottom: 0px;
    min-height: 0px;
}
</style>
@if($categoryStart)
    @foreach ($categoryStart as $item)
    <section class="section danh-muc-section section_791233928">
        <div class="bg section-bg fill bg-fill  bg-loaded" ></div>
        <div class="section-content relative">
            <div class="row" style="max-width:1280px">
                <div id="col-1616858964" class="col small-12 large-12"  >
                    <div class="col-inner"  >
                        <h2 class="title-main" style="text-align: center;">
                            <span style="font-family: robotocondensed-b; font-size: 100%;">{{ $item['name'] }} NỔI BẬT</span></h2>
                        <p><img loading="lazy" class="size-full wp-image-1018 aligncenter" src="{{ asset('wp-content/uploads/2020/12/bgtitle.png') }}" alt="" width="163" height="14" sizes="(max-width: 163px) 100vw, 163px" /></p>
                        <div class="gap-1859923817 gap-element clearfix" style="display:block; height:auto;">
                        </div>
                        @if($item['post_list'])
                            <div class="row hinh-sp-trang-chu large-columns-4 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                                @foreach ($item['post_list'] as $value)
                                    <div class="product-small col has-hover product type-product post-13265 status-publish first instock product_cat-cua-nhom-noi-bat product_cat-nhom-kinh has-post-thumbnail shipping-taxable product-type-simple">
                                        <div class="col-inner">
                                            <div class="badge-container absolute left top z-1"></div>
                                            <div class="product-small box ">
                                                <div class="box-image">
                                                    <div class="image-fade_in_back">
                                                        <a href="{{ route('detail-post', ['tin-tuc', $item['slug'], $value['slug']]) }}" data-wpel-link="internal">
                                                            <img width="247" height="296" src="{{ asset($value['image']) }}" style="height: 296px;" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{ $value['name'] }}" loading="lazy" />
                                                            <img width="247" height="296" src="{{ asset($value['image']) }}" style="height: 296px;" class="show-on-hover absolute fill hide-for-small back-image" loading="lazy" sizes="(max-width: 247px) 100vw, 247px" />
                                                        </a>
                                                    </div>
                                                    <div class="image-tools is-small top right show-on-hover"></div>
                                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover"></div>
                                                </div>
                                                <div class="box-text box-text-products text-center grid-style-2">
                                                    <div class="title-wrapper">
                                                        <p class="name product-title woocommerce-loop-product__title">
                                                            <a href="{{ route('detail-post', ['tin-tuc', $item['slug'], $value['slug']]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" data-wpel-link="internal">{{ $value['name'] }}</a>
                                                        </p>
                                                    </div>
                                                    <div class="price-wrapper"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
@endif
