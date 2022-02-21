<style>
#gap-1696736364 {
    padding-top: 30px;
}
</style>
<section class="section" id="section_1868104888">
    <div class="bg section-bg fill bg-fill  bg-loaded" ></div>
    <div class="section-content relative">
        <div class="row" style="max-width:1280px" id="row-670710482">
            <div id="col-27424462" class="col small-12 large-12"  >
                <div class="col-inner"  >
                    <h2 class="title-main" style="text-align: center;"><span style="font-family: robotocondensed-b; font-size: 100%;">DÒNG SẢN PHẨM CHÍNH</span></h2>
                    <p>
                        <img loading="lazy" class="size-full wp-image-1018 aligncenter" src="wp-content/uploads/2020/12/bgtitle.png" alt="" width="163" height="14" sizes="(max-width: 163px) 100vw, 163px" /></p>
                    <div id="gap-1696736364" class="gap-element clearfix" style="display:block; height:auto;">
                    </div>
                    <div class="row box-img-cong-trinh large-columns-4 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-outside"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 3000}'>
                        @if($countPostCategory)
                            @foreach ($countPostCategory as $item)
                            <div class="product-category col" >
                                <div class="col-inner">
                                    <a href="danh-muc-san-pham/san-pham-khac/index.html" data-wpel-link="internal"> 
                                        <div class="box box-category has-hover box-shade dark ">
                                            <div class="box-image" >
                                                <div class="image-cover" style="padding-top:100%;">
                                                    <img src="{{ (count($item['post_list']) > 0) ? asset($item['post_list'][0]['image']) : 'wp-content/uploads/2020/11/not-found-image.png' }}" alt="Sản phẩm khác" width="300" height="300" />
                                                    <div class="shade"></div>
                                                </div>
                                            </div>
                                            <div class="box-text text-center" >
                                                <div class="box-text-inner">
                                                    <h5 class="uppercase header-title">
                                                        {{ $item['name'] }}
                                                    </h5>
                                                    <p class="is-xsmall uppercase count ">{{ count($item['post_list']) ?? 0 }} Sản phẩm </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>