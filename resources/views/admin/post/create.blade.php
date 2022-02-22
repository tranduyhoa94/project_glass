@extends('admin.layouts.app')

@section('title', __('New Post'))
@section('css')
<style>

</style>   
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('post.store')}}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="language" value="{{app()->getLocale()}}" />
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-xl-3">
                                <x-dropify name="file" class="mb-sm-4" required />
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex align-items-center mb-2">
                                <div class="card card-body px-0 mb-0">
                                    @if(Route::has('category.index'))
                                    <x-select name="category_id" label="Categories" :option-list="$categoryList" required />
                                    @endif
                                    <x-input name="name" label="Title" required />
                                    @php
                                        $setStart = json_decode(json_encode([['id' => '0', 'name' => 'Bài Viết'], ['id' => '1', 'name' => 'Công Trình']]));
                                    @endphp
                                    <x-select name="type"  label="Bài Viết" required :option-list="$setStart" />
                                </div>
                            </div>
                        </div>
                        <x-summernote name="sort_description" label="Nội dung ngắn" />
                        <x-summernote name="content" label="Content" />
                        @createseo
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
