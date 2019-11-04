@extends('front.layouts.main')

@section('css')
    
@endsection

@section('body')

<!--================Blog Area =================-->
<section class="blog_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach ($projects as $project)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{$project->watermark()}}" alt="{{$project->name}}" style="max-height:50vh;object-fit:cover">
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{route('guest.projects.show', $project->id)}}">
                                <h2>{{$project->name}}</h2>
                            </a>
                            <p>{{$project->description}}</p>
                            
                            @include('front.projects.layouts.info')
                        </div>
                    </article>
                    @endforeach

                    <nav class="blog-pagination justify-content-center d-flex">
                        {{$projects->links()}}
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @include('front.projects.layouts.menu')
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

@endsection

@section('script')
    
@endsection