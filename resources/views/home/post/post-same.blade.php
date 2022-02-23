<style>
    .related-products-wrapper {
        display: block !important;
    }
</style>
<div class="related related-products-wrapper product-section">
    <h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">Sản phẩm tương tự	</h3>
    <div class="row large-columns-4 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  
        data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
        @if($postList)
            @foreach ($postList as $item)
                <div class="product-small col has-hover product type-product post-1869 status-publish instock product_cat-nhom-kinh has-post-thumbnail shipping-taxable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1"></div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <a href="{{ route('detail-post', ['tin-tuc', $cateogry['slug'], $item['slug']]) }}" data-wpel-link="internal">
                                    <img width="247" style="height: 296px" height="296" src="{{ asset($item->image ?? 'wp-content/uploads/2020/11/not-found-image.png') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{ $item->name }}" loading="lazy" />
                                </a>
                            </div>
                            <div class="image-tools is-small top right show-on-hover"></div>
                            <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover"></div>
                        </div>
                        <div class="box-text box-text-products text-center grid-style-2">
                            <div class="title-wrapper">
                                <p class="name product-title woocommerce-loop-product__title">
                                    <a href="{{ route('detail-post', ['tin-tuc', $cateogry['slug'], $item['slug']]) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" data-wpel-link="internal">{{ $item->name }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>