@extends('front.layouts.main')

@section('css')
    
@endsection

@section('body')

<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>Every child yearns to learn</h5>
                        <h1>Making Your Childs
                            World Better</h1>
                        <p>Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales
                            his void unto last session for bite. Set have great you'll male grass yielding yielding
                            man</p>
                        <a href="#" class="btn_1">View Course </a>
                        <a href="#" class="btn_2">Get Started </a>
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
                    <p>Projects</p>
                    <h2><a href="{{route('guest.projects.type', $type->id)}}">{{$type->name}}</a></h2>
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
<section class="blog_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>News</p>
                    <h2><a href="{{route('guest.news')}}">Highlights</a></h2>
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
<!--::blog_part end::-->

@endsection

@section('script')
    
@endsection