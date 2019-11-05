{{-- 

    $data : posts chunk
    
--}}

<div class="textimonial_iner owl-carousel">
    @foreach ($data as $posts)
    <div class="testimonial_slider">
        <div class="row pb-5">
            @foreach ($posts as $post)
            <div class="col-sm-6 col-lg-4 col-xl-4">
                <div class="single-home-blog">
                    <div class="card">
                        <img src="{{$post->watermark()}}" class="card-img-top" alt="{{$post->title}}">
                        <div class="card-body">
                            <a href="{{route('guest.news.show', $post->id)}}">
                                <h5 class="card-title">{{$post->title}}</h5>
                            </a>
                            <p>{{$post->description}}</p>
                            <ul>
                                <li> <span class="ti-calendar"></span>{{$post->created_at}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>