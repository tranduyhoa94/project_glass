<div class="html-before-comments mb">
    <div class="row row-box-shadow-2" style="max-width:1280px" id="row-1027358280">
        <div id="col-576926236" class="small-12 large-12">
            <div class="col-inner text-center">
                <div class="container section-title-container">
                    <h3 class="section-title section-title-normal"><b></b>
                        <span class="section-title-main">Công trình liên quan</span><b></b>
                    </h3>
                </div>
                <div class="row large-columns-3 medium-columns-1 small-columns-1">
                    @if($postList)
                        @foreach ($postList as $item)
                            <div class="col post-item">
                                <div class="col-inner">
                                    <a href="{{ route('build-detail', [$item['slug']]) }}" class="plain" data-wpel-link="internal">
                                        <div class="box box-shade dark box-text-bottom box-blog-post has-hover">
                                            <div class="box-image">
                                                <div class="image-overlay-add image-cover" style="padding-top:56.25%;">
                                                    <img width="614" height="400" src="{{ asset($item['image']) }}" class="attachment-medium size-medium wp-post-image" alt="{{ $item['name'] }}" loading="lazy" sizes="(max-width: 614px) 100vw, 614px">
                                                    <div class="overlay" style="background-color: rgba(255, 203, 0, 0.39)"></div>
                                                    <div class="shade"></div>
                                                </div>
                                            </div>
                                            <div class="box-text text-center">
                                                <div class="box-text-inner blog-post-inner">
                                                    <h5 class="post-title is-large ">{{ $item['name'] }}</h5>
                                                    <div class="is-divider"></div>
                                                    <button href="{{ route('build-detail', [$item['slug']]) }}" class="button primary is-gloss is-small mb-0">
                                                        Xem chi tiết
                                                    </button>
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