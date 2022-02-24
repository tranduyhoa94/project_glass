<style>
#gap-1232319643 {
    padding-top: 40px;
}
@media (min-width:550px) {
    #gap-1232319643 {
        padding-top: 30px;
    }
}
#gap-1778299481 {
    padding-top: 30px;
}
@media (min-width:550px) {
    #gap-1778299481 {
        padding-top: 30px;
    }
}
#section_1184220884 {
    padding-top: 30px;
    padding-bottom: 30px;
}
#section_1184220884 .section-bg.bg-loaded {
    background-image: url(wp-content/uploads/2020/11/bg-cong-trinh.jpg);
}
#section_1184220884 .section-bg {
    background-position: inherit;
}
#col-1407230285 > .col-inner {
    padding: 0 0px 0px 0px;
    margin: 0 0px 0px 0px;
}

#row-975584342 > .col > .col-inner {
    padding: 0 0px 0px 0px;
}
</style>
@if($posts)
<section class="section ss-congtrinh" id="section_1184220884">
    <div class="bg section-bg fill bg-fill" ></div>
    <div class="section-content relative">
        <div class="row align-middle" style="max-width:1280px" id="row-975584342">
            <div id="col-1407230285" class="col small-12 large-12"  >
                <div class="col-inner">
                    <div id="gap-1232319643" class="gap-element clearfix" style="display:block; height:auto;"></div>
                    <h2 class="title-main" style="text-align: center;"><span style="font-family: robotocondensed-b; font-size: 100%; color: #ffffff;">CÔNG TRÌNH NỔI BẬT</span></h2>
                    <p><img loading="lazy" class="size-full wp-image-1018 aligncenter" src="../phucdat.thietkeweb.edu.vn/wp-content/uploads/2020/11/bgtitle.html" alt="" width="163" height="14" srcset="https://phucdatdoor.vn/wp-content/uploads/2020/11/bgtitle.png 163w, https://phucdatdoor.vn/wp-content/uploads/2020/11/bgtitle-24x2.png 24w, https://phucdatdoor.vn/wp-content/uploads/2020/11/bgtitle-36x3.png 36w, https://phucdatdoor.vn/wp-content/uploads/2020/11/bgtitle-48x4.png 48w" sizes="(max-width: 163px) 100vw, 163px" /></p>
                    <div id="gap-1778299481" class="gap-element clearfix" style="display:block; height:auto;"></div>
                    <div class="row box-img-cong-trinh large-columns-3 medium-columns-1 small-columns-1 slider row-slider slider-nav-simple"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 4000}'>
                        @foreach ($posts as $item)
                            <div class="col post-item" >
                                <div class="col-inner">
                                    <a href="{{ route('build-detail', [$item['slug']]) }}" class="plain" data-wpel-link="internal">
                                        <div class="box box-shade dark box-text-bottom box-blog-post has-hover">
                                            <div class="box-image" >
                                                <div class="image-cover" style="padding-top:75%;">
                                                    <img width="300" height="400" style="width: 387px; height: 400px;" src="{{ asset($item['image']) }}" class="attachment-medium size-medium wp-post-image" alt="{{ $item['name'] }}" loading="lazy"  sizes="(max-width: 300px) 100vw, 300px" />
                                                    <div class="shade"></div>
                                                </div>
                                            </div>
                                            <div class="box-text text-center" >
                                                <div class="box-text-inner blog-post-inner">
                                                    <h5 class="post-title is-large ">{{ $item['name'] }}</h5>
                                                    <div class="is-divider"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif