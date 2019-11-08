@extends('admin.layouts.main')

@section('body')

<div class="row match-height">
    @foreach ($logos as $logo)
        <div class="col-md-4">
            @php
                $data = [
                    'name' => $logo->name,
                    'image' => $logo->path(),
                ];
            @endphp

            @include('admin.layouts.forms.image', $data)
        </div>    
    @endforeach
</div>

@endsection

@section('script')

@foreach ($logos as $logo)
    @include('admin.layouts.components.image-upload', ['url' => route('admin.upload.logo'), 'name' => $logo->name])
@endforeach
    
@endsection
