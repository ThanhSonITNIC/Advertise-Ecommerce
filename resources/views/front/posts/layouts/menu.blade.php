<aside class="single_sidebar_widget search_widget">
    <form action="{{route('guest.news')}}" method="GET">
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" name='search' value="{{request()->search}}" class="form-control" placeholder='Search Keyword'
                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                <div class="input-group-append">
                <button class="btn" type="button"><i class="ti-search"></i></button>
                </div>
            </div>
        </div>
        <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">@lang('Search')</button>
    </form>
</aside>

<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">@lang('Highlights')</h3>
    @foreach ($highlightPosts as $post)
    <div class="media post_item">
        <img src="{{$post->watermark()}}" alt="{{$post->title}}" style="max-width: 25%">
        <div class="media-body">
            <a href="{{route('guest.news.show', $post->id)}}">
                <h3>{{$post->title}}</h3>
            </a>
            <p>{{$post->created_at}}</p>
        </div>
    </div> 
    <hr>
    @endforeach
</aside>