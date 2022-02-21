<style>
.image_762523808 {
  width: 100%;
}
</style>
<section class="section hide-for-small" id="section_1619417736">
		<div class="bg section-bg fill bg-fill bg-loaded"></div>
    <div class="section-content relative">
      <div class="row row-collapse row-full-width" id="row-720613387">
        <div id="col-1509489348" class="col small-12 large-12">
          <div class="col-inner">
            <div class="slider-wrapper relative" id="slider-1591780751">
              <div class="slider slider-nav-circle slider-nav-large slider-nav-light slider-style-normal is-draggable flickity-enabled" data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 3000}'>
              @if ($slides)
                @foreach ($slides as $item)
                <div class="img has-hover x md-x lg-x y md-y lg-y image_762523808">
                  <div class="img-inner dark">
                    <img width="1020" height="319" src="{{ asset($item['image'] ?? '') }}" class="attachment-large size-large" alt="banner phucdatdoor.vn" loading="lazy" sizes="(max-width: 1020px) 100vw, 1020px">						
                  </div>		
                </div>
                @endforeach
              @endif 
          </div>
          </div>
          <div class="loading-spin dark large centered" style="display: none;"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
#section_1619417736 {
    padding-top: 0px;
    padding-bottom: 0px;
  }
</style>
</section>