@extends('home.layouts.app')

@section('title', __('About Us'))

@section('css')



@endsection
@section('content')
<div class="row row-main">
    <div class="large-12 col">
        @if ($page)
            <div class="col-inner">
                <h1>{{ $page['name'] }}</h1>
                {!! $page['content'] ?? '' !!}
            </div>
        @else 
            <div class="col-inner">
                <h1>Bài viết không tồn tại!.</h1>    
            </div>
        @endif
    </div>
</div>
@endsection
