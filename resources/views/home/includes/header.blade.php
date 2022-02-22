<header id="header" class="header has-sticky sticky-jump">
  <div class="header-wrapper">
    <div id="top-bar" class="header-top hide-for-sticky nav-dark flex-has-center hide-for-medium">
        <div class="flex-row container">
            <div class="flex-col hide-for-medium flex-left">
                <ul class="nav nav-left medium-nav-center nav-small  nav-">
                    <li class="html custom html_topbar_left">
                      <div class="title-topbar">
                        <div class="">THI CÔNG CHUYÊN NGHIỆP</br> BẢO HÀNH CHẤT LƯỢNG</div>
                        <a href="tel:0905532506" data-wpel-link="internal">Hotline: 0905.532.506</a>
                      </div>
                    </li>
                </ul>
            </div>

            <div class="flex-col hide-for-medium flex-center">
                <ul class="nav nav-center nav-small  nav-">
                    <li class="header-search-form search-form html relative has-icon">
                      <div class="header-search-form-wrapper">
                        <div class="searchform-wrapper ux-search-box relative is-normal">
                          <form role="search" method="get" class="searchform" action="#">
                            <div class="flex-row relative">
                              <div class="flex-col flex-grow">
                                <label class="screen-reader-text" for="woocommerce-product-search-field-0">Tìm kiếm:</label>
                                <input type="search" id="woocommerce-product-search-field-0" class="search-field mb-0" placeholder="Tìm kiếm sản phẩm" value="" name="s" />
                                <input type="hidden" name="post_type" value="product" />
                              </div>
                              <div class="flex-col">
                                <button type="submit" value="Tìm kiếm" class="ux-search-submit submit-button secondary button icon mb-0">
                                  <i class="icon-search" ></i>
                                </button>
                              </div>
                            </div>
                            <div class="live-search-results text-left z-top"></div>
                          </form>
                        </div>
                      </div>
                    </li>
                </ul>
              </div>
          </div>
      </div>
  </div>
  <div id="masthead" class="header-main nav-dark">
    <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
      <div id="logo" class="flex-col logo">
        <a href="{{ route('index') }}" title="Thiên Ân Phát - Chuyên thi công lắp đặt nhôm kính, nhôm Xingfa" rel="home" data-wpel-link="internal">
          <img width="192" height="80" src="{{ asset('wp-content/uploads/2020/12/logo-thien-an-phat.png') }}" class="header_logo header-logo" alt="Thiên ân phát"/>
          <img  width="192" height="80" src="{{ asset('wp-content/uploads/2020/12/logo-thien-an-phat.png') }}" class="header-logo-dark" alt="Thiên ân phát"/>
        </a>
      </div>

      <div class="flex-col show-for-medium flex-left">
        <ul class="mobile-nav nav nav-left ">
          <li class="nav-icon has-icon">
            <div class="header-button">
              <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color="" class="icon primary button round is-small" aria-label="Menu" aria-controls="main-menu" aria-expanded="false">
                <i class="icon-menu" ></i>
              </a>
            </div>
          </li>
        </ul>
      </div>

      <div class="flex-col hide-for-medium flex-left flex-grow">
        <ul class="header-nav header-nav-main nav nav-left  nav-size-large nav-spacing-medium nav-uppercase" >
          <li id="menu-item-999" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-999 active menu-item-design-default">
            <a href="{{ route('index') }}" aria-current="page" class="nav-top-link" data-wpel-link="internal">Trang Chủ</a>
          </li>
          @if ($categories)
            @foreach ($categories as $item)
                @if($item['child_list'])
                <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-design-default has-dropdown">
                  <a href="#" class="nav-top-link" data-wpel-link="internal">{{ $item['name'] }}<i class="icon-angle-down" ></i>
                  </a>
                  <ul class="sub-menu nav-dropdown nav-dropdown-simple dropdown-uppercase">
                    @foreach ($item['child_list'] as $i)
                    <li class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="#" data-wpel-link="internal">{{ $i['name'] }}</a>
                    </li>
                    @endforeach
                  </ul>
                @else
                <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-design-default">
                  <a href="{{ route('post-category', ['tin-tuc', $item['slug']]) }}" class="nav-top-link" data-wpel-link="internal">{{ $item['name'] }}</a>
                @endif
              </li>
            @endforeach
          @endif
          <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-1412 menu-item-design-default has-dropdown">
            <a href="#" class="nav-top-link" data-wpel-link="internal">Tư vấn<i class="icon-angle-down" ></i></a>
            <ul class="sub-menu nav-dropdown nav-dropdown-simple dropdown-uppercase">
              <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('about-us', ['gioi-thieu']) }}" data-wpel-link="internal">Giới thiệu</a></li>
              <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('get-contact', ['lien-he']) }}" data-wpel-link="internal">Liên hệ</a></li>
            </ul>
          </li>
        </ul>

      </div>

      <!-- Right Elements -->
      <div class="flex-col hide-for-medium flex-right">
        <ul class="header-nav header-nav-main nav nav-right  nav-size-large nav-spacing-medium nav-uppercase"></ul>
      </div>

      <!-- Mobile Right Elements -->
      <div class="flex-col show-for-medium flex-right">
        <ul class="mobile-nav nav nav-right "></ul>
      </div>

    </div>
 
    <div class="container">
      <div class="top-divider full-width"></div>
    </div>
  </div>
  <div class="header-bg-container fill">
    <div class="header-bg-image fill"></div>
    <div class="header-bg-color fill"></div>
  </div>
</header>

<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide mobile-sidebar-slide mobile-sidebar-levels-1" data-levels="1">
	<div class="sidebar-menu no-scrollbar ">
		<ul class="nav nav-sidebar nav-vertical nav-uppercase nav-slide">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-999"><a href="{{ route('index') }}" aria-current="page" data-wpel-link="internal">Trang Chủ</a></li>
			@if ($categories)
        @foreach ($categories as $item)
            @if($item['child_list'])
            <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children">
              <a href="#" data-wpel-link="internal">{{ $item['name'] }}</a>
              <ul class="sub-menu nav-sidebar-ul children">
                @foreach ($item['child_list'] as $i)
                <li class="menu-item menu-item-type-post_type menu-item-object-product">
                  <a href="#" data-wpel-link="internal">{{ $i['name'] }}</a>
                </li>
                @endforeach
              </ul>
            @else
            <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-design-default">
              <a href="#" class="nav-top-link" data-wpel-link="internal">{{ $item['name'] }}</a>
            @endif
          </li>
        @endforeach
      @endif   
			<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-1412"><a href="goc-tu-van/index.html" data-wpel-link="internal">Tư vấn</a>
				<ul class="sub-menu nav-sidebar-ul children">
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13439"><a href="{{ route('about-us', ['gioi-thieu']) }}" data-wpel-link="internal">Giới thiệu</a></li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13344"><a href="{{ route('get-contact', ['lien-he']) }}" data-wpel-link="internal">Liên hệ</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>