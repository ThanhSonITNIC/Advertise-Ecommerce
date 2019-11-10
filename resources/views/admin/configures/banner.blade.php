@extends('admin.layouts.main')

@section('title')
@lang('Banner')
@endsection

@section('body')

<div class="row match-height">
    @foreach ($images as $image)
        <div class="col-md-4">
            @php
                $data = [
                    'name' => $image->name,
                    'image' => $image->path(),
                ];
            @endphp

            @include('admin.layouts.forms.image', $data)
        </div>    
    @endforeach
</div>

@endsection

@section('script')

@foreach ($images as $image)
    @include('admin.layouts.components.image-upload', ['url' => route('admin.upload.banner'), 'name' => $image->name])
@endforeach
    
@endsection
