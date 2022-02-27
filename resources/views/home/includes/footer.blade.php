<footer id="footer" class="footer-wrapper">
  <section class="section ft-3" id="section_891941221">
    <div class="bg section-bg fill bg-fill  bg-loaded" ></div>
    <div class="section-content relative">
      <div class="row row-small"  id="row-954165278">
        <div id="col-198630571" class="col medium-3 small-12 large-3">
          <div class="col-inner">
            <div class="img has-hover logoft x md-x lg-x y md-y lg-y" id="image_1524235964">
              <div class="img-inner dark" >
                <img width="92" height="64" src="{{ asset('wp-content/uploads/2020/12/logo-1.png') }}" class="attachment-large size-large" alt="" loading="lazy" sizes="(max-width: 92px) 100vw, 92px" />
              </div>
              <style>
              #image_1524235964 {
                width: 40%;
                margin: 0px auto;
              }
              @media (min-width:550px) {
                #image_1524235964 {
                  width: 75%;
                }
              }
              </style>
            </div>
            <h4><span style="color: #ffffff;" data-cms="{{app()->getLocale()}}-footer-1">CÔNG TY TNHH THIÊN ÂN PHÁT</span></h4>
            <p><span style="color: #ffffff;" data-cms="{{app()->getLocale()}}-footer-2">Thiên Ân Phát là công ty chuyên tư vấn - thi công lắp đặt nhôm kính, nhôm Xingfa, kính cường lực tại Tp Đà Nẵng; với uy tín, đội ngũ chuyên nghiệp, thi công nhanh chóng &amp; chất lượng.</span></p>
          </div>
          <style>
          #col-198630571 > .col-inner {
            ng: 32px 0px 0px 0px;
          }
          </style>
        </div>
        <div id="col-916851360" class="col medium-3 small-12 large-3"  >
          <div class="col-inner"  >
            <h3><span style="color: #ffffff;">THÔNG TIN LIÊN HỆ</span></h3>
            <p><span style="color: #ffffff;" data-cms="{{app()->getLocale()}}-footer-5"><b>1. Trụ sở chính:</b> 62 Bàu Gia Thượng 3, Hòa Thọ Đông, Cẩm Lệ, Đà Nẵng</span></p>
            <p><span style="color: #ffffff;" data-cms="{{app()->getLocale()}}-footer-6"><b>2. Showroom:</b> BP BCG, 40 Bích Khuê, Hòa Xuân, Đà Nẵng</span></p>
            <p><span style="color: #ffffff;" data-cms="{{app()->getLocale()}}-footer-7"><b>Hotline:</b> <a style="color: #ffffff;" href="tel:0901116118" data-wpel-link="internal">0905.532.506</a></span></p>
            <p><span style="color: #ffffff;" data-cms="{{app()->getLocale()}}-footer-8"><b>Email:</b> <a style="color: #ffffff;" href="#">dtthienanphat@gmail.com</a></span></p>
          </div>
  
          <style>
          #col-916851360 > .col-inner {
            padding: 30px 0px 0px 0px;
          }
          </style>
        </div>
        <div id="col-1936614050" class="col medium-3 small-12 large-3"  >
          <div class="col-inner"  >
            <h3><span style="color: #ffffff;">ĐIỀU KHOẢN SỬ DỤNG</span></h3>
            <ul class="sidebar-wrapper ul-reset">
              <li id="nav_menu-2" class="widget widget_nav_menu">
                <div class="menu-dieu-khoan-su-dung-container">
                  <ul id="menu-dieu-khoan-su-dung" class="menu">
                    @if ($pages)
                      @foreach ($pages as $item)
                      <li class="menu-item menu-item-type-post_type menu-item-object-page">
                        <a href="{{ route('page', [$item['slug']]) }}" data-wpel-link="internal">{{ $item['name'] }}</a>
                      </li>
                      @endforeach
                    @endif
                  </ul>
                </div>
              </li>
            </ul>
            <p><a href="#" data-wpel-link="external" target="_blank" rel="nofollow external noopener noreferrer">
              <img alt='' title='' src="{{ asset('wp-content/uploads/2020/11/logoSaleNoti.png') }}"/></a>
            </p>
          </div>
          <style>
          #col-1936614050 > .col-inner {
            padding: 30px 0px 0px 0px;
          }
          </style>
        </div>
        <div id="col-454406717" class="col medium-3 small-12 large-3"  >
          <div class="col-inner"  >
            <ul class="share-icon">
              <li>
                <a href="{{ $config->where('name', 'facebook')->first()->toArray()['content'] }}" data-wpel-link="external" target="_blank" rel="nofollow external noopener noreferrer">
                  <img src="{{ asset('wp-content/uploads/2020/12/fb.png') }}">
                </a>
              </li>
              {{-- <li>
                <a href="#" data-wpel-link="external" target="_blank" rel="nofollow external noopener noreferrer">
                  <img src="{{ asset('wp-content/uploads/2020/12/in.png') }}"></a>
              </li> --}}
              <li>
                <a href="{{ $config->where('name', 'youtube')->first()->toArray()['content'] }}" data-wpel-link="external" target="_blank" rel="nofollow external noopener noreferrer">
                  <img src="{{ asset('wp-content/uploads/2020/12/yt.png') }}"></a>
              </li>
            </ul>
            <div class="dmca">
              <a href="#" data-wpel-link="external" target="_blank" rel="nofollow external noopener noreferrer">
                <img src="{{ asset('wp-content/uploads/2020/12/dmca-badge-w250-5x1-06.png') }}">
              </a>
            </div>
          </div>
          <style>
          #col-454406717 > .col-inner {
            padding: 29px 0px 30px 0px;
          }
          </style>
        </div>
      </div>
    </div>
    <style>
    #section_891941221 {
      padding-top: 30px;
      padding-bottom: 30px;
      background-color: rgb(0, 77, 101);
    }
    </style>
  </section>
  {{-- <div class="absolute-footer dark medium-text-center text-center">
    <div class="container clearfix">
      <div class="footer-primary pull-left">
        <div class="copyright-footer">
          Công ty TNHH Nhôm Kính Phúc Đạt - 480/3 Tân Kỳ Tân Quý, P. Sơn Kỳ, Q. Tân Phú, TPHCM - Đại diện: NGUYỄN PHẠM HÙNG</br>
          Mã số thuế: 0312974576. Cấp ngày: 16/10/2014 tại Phòng đăng ký kinh doanh Sở Kế hoạch và Đầu tư Thành phố Hồ Chí Minh
        </div>
      </div>
    </div>
  </div> --}}
  <a href="#top" class="back-to-top button icon invert plain fixed bottom z-1 is-outline hide-for-medium circle" id="top-link">
    <i class="icon-angle-up" ></i>
  </a>
</footer>