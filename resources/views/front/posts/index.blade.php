@extends('front.layouts.main')

@section('title')
@lang('Posts')
@endsection

@section('body')

<!--================Blog Area =================-->
<section class="blog_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach ($posts as $post)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{$post->watermark()}}" alt="{{$post->title}}" style="max-height:50vh;object-fit:cover">
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{route('guest.news.show', $post->id)}}">
                                <h2>{{$post->title}}</h2>
                            </a>
                            <p>{{$post->description}}</p>
                            
                            @include('front.posts.layouts.info')
                        </div>
                    </article>
                    @endforeach

                    <nav class="blog-pagination justify-content-center d-flex">
                        {{$posts->links()}}
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @include('front.posts.layouts.menu')
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

@endsection

@section('script')
    
@endsection