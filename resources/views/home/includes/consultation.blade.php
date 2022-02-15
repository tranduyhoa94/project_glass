<div class="grid-action">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-lx-2"></div>
            <div class="col-12 col-md-10 col-lx-8">
                <div class="box-action row">
                    <div class="box-action--content col-12 col-md-6">
                        <h3 class="title" data-cms="{{app()->getLocale()}}-includes-consultation-1">Bạn cần sự tư vấn</h3>
                        <div class="sapo" data-cms="{{app()->getLocale()}}-includes-consultation-2">Hãy liên hệ với chúng tôi!</div>
                    </div>
                    <div class="box-action--form col-12 col-md-6 d-flex align-items-center">
                        <form class="form-group js-form">
                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại của bạn" required>
                            <button type="submit" class="btn btn-form">
                                <svg class="icon"><use xlink:href="#icon-send"></use></svg>
                                <span>@lang('Send')</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-lx-2"></div>
        </div>
    </div>
</div>
