<div class="blog_right_sidebar">
    <aside class="single_sidebar_widget search_widget">
        <form action="" method="GET">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" name='search' value="{{request()->search}}" class="form-control" placeholder='Search Keyword'
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                    <div class="input-group-append">
                    <button class="btn" type="button"><i class="ti-search"></i></button>
                    </div>
                </div>
            </div>
            <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
        </form>
        </aside>

    <aside class="single_sidebar_widget post_category_widget">
        <h4 class="widget_title">Category</h4>
        <ul class="list cat-list">
            @foreach ($projectTypes as $type)
            <li>
                <a href="{{route('guest.projects.type', $type->id)}}" class="d-flex">
                    <p>{{$type->name}}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </aside>

    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title">Highlights</h3>
        @foreach ($highlightProjects as $project)
        <div class="media post_item">
            <img src="{{$project->watermark()}}" alt="{{$project->name}}" style="max-width: 25%">
            <div class="media-body">
                <a href="{{route('guest.projects.show', $project->id)}}">
                    <h3>{{$project->name}}</h3>
                </a>
                <p>{{$project->created_at}}</p>
            </div>
        </div> 
        <hr>
        @endforeach
    </aside>
</div>