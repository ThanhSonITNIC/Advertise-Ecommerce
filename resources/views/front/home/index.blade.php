@extends('front.layouts.main')

@section('title')
{{config('app.name')}}
@endsection

@section('body')

<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h1>{{$configures['slogan'] ?? ''}}</h1>
                        <p>{{$configures['description'] ?? ''}}</p>
                        <a href="{{route('guest.projects')}}" class="btn_1">@lang('View projects') </a>
                        <a href="{{route('guest.contact')}}" class="btn_2">@lang('Contact') </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!--::review_part start::-->
<section class="testimonial_part">
    @foreach ($projectTypes as $type)
    @if($type->projects->count() > 2)    
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>@lang('Projects')</p>
                    <h2><a href="{{route('guest.projects.type', $type->id)}}">@lang($type->name)</a></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('front.home.slides.lite', ['data' => $type->projects->chunk(3)])
            </div>
        </div>
    </div>
    <hr>
    @endif
    @endforeach
</section>
<!--::blog_part end::-->
<!--::blog_part start::-->
@if($highlightPosts->count() > 2)
<section class="blog_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>@lang('News')</p>
                    <h2><a href="{{route('guest.news')}}">@lang('Highlights')</a></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('front.home.slides.full', ['data' => $highlightPosts->chunk(3)])
            </div>
        </div>
    </div>
</section>
@endif
<!--::blog_part end::-->

@endsection

@section('script')
    
@endsection