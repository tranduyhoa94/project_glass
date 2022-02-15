@extends('home.layouts.app')

@section('title', $post->name)
@section('cover', url($post->image))
@section('content')
    <div class="page-wrapper new-detail">
        {{-- Block hero --}}
        <section class="tour" id="grid-hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 tour-content">
                        <h2>{{$post->name}}</h2>
                        <img @src="{{$post->image}}" alt="{{$post->name}}" class="tour-image" />
                        <div class="tour-subtitle-wrapper wrapper-content">
                            {!!$post->content!!}
                        </div>
                        <input value="{{url($post->href)}}" type="text" style="display: none;" id="link-post"/>
                        <div class="btn-normal" style="margin-top: 10px; text-align: right">
                            <a style="background: #4F4F4F; border-radius: 24px;" href="javascript:void(0)"  onclick="copy('link-post')" title="Get to know us">
                                <span style="color: white !important" class="btn-normal__title">Sao chép liên kết</span>
                                <svg style="color: white !important" class="icon"><use xlink:href="#icon-arrow"></use></svg>
                            </a>
                        </div>
                        <div class="tour-contact-wrapper">
                            <img @src="/images/home/full-red-circle.png" alt="circle" class="tour-contact-circle" />
                            <div>
                                <a href="/@lang('contact')" class="tour-contact-direct">@lang('Contact')</a>
                                <img @src="/images/home/arrow_forward_24px.png" alt="arrow direct" class="tour-contact-arrow" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 tour-list-item">
                        <h4>@lang('News')</h4>
                        <div class="tour-search-wrapper">
                            <img @src="/images/home/icon-search.png" alt="icon-search" class="tour-search-icon" />
                            <input type="text" name="search" id="search" placeholder="Search now" class="tour-search" />
                        </div>
                        <div class="tour-suggest-wrapper">
                            <h4>Gợi ý cho bạn</h4>
                            @foreach ($postList as $item)
                                <a href="{{$item->href}}" class="tour-suggest-item">
                                    <img @src="{{$item->image}}" alt="{{$item->name}}" class="tour-image-item" />
                                    <div>
                                        <h6 class="tour-suggest-title">{{$item->name}}</h6>
                                        <p class="tour-suggest-description">{{$item->excerpt}}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>
        {{-- Block action --}}
        @include('home.includes.consultation')
    </div>

@endsection
@section('js')
<script>
    function copy(id) {
        /* Get the text field */
        var copyText = document.getElementById(id);
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(copyText.value).select();
        document.execCommand("copy");
        $temp.remove();
    }

</script>
@endsection
