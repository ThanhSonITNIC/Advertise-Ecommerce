@extends('front.layouts.main')

@section('title')
{{$project->name}}
@endsection

@section('meta')
<meta property="og:url"           content="{{route('guest.projects.show', $project->id)}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{$project->name}}" />
<meta property="og:description"   content="{{$project->description}}" />
<meta property="og:image"         content="{{$project->watermark()}}" />
@endsection

@section('css')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=426454707950596&autoLogAppEvents=1"></script>
@endsection

@section('body')

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{$project->image()}}" alt="{{$project->name}}">
                    </div>
                    <div class="blog_details">
                        <h2>{{$project->name}}</h2>
                        <div class="mt-3 mb-4">
                            @include('front.projects.layouts.info')
                        </div>
                        <p>{{$project->description}}</p>
                        <hr>
                        <div id="editor" 
                            class="ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline ck-blurred" 
                            lang="en" dir="ltr" role="textbox" aria-label="Rich Text Editor, main" contenteditable="false">
                            <p>
                                {!! $project->content !!}
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <ul class="social-icons">
                            <li>
                                <div class="fb-share-button" data-href="{{route('guest.projects.show', $project->id)}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @include('front.projects.layouts.menu')
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tags</h4>
                        <ul class="list">
                            @foreach (explode(',', $project->tags) as $tag)
                            <li>
                                <a>{{$tag}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area end =================-->    

@endsection

@section('script')
    
    @include('front.layouts.editor.ckeditor5')

@endsection