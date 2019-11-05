{{-- 

    $data : projects chunk

--}}

<div class="textimonial_iner owl-carousel">
    @foreach ($data as $projects)
    <div class="testimonial_slider">
        <div class="row">
            @foreach ($projects as $project)
            <div class="col-xl-4 col-sm-6 align-self-center mb-2">
                <div class="testimonial_slider_text p-5" style="background-image: url('{{$project->watermark()}}');">
                    <p>{{$project->description}}</p>
                    <h4><a href="{{route('guest.projects.show', $project->id)}}">{{$project->name}}</a></h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>