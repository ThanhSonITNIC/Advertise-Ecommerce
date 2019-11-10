@extends('admin.layouts.main')

@section('title')
@lang('Posts')
@endsection

@section('body')

@include('admin.layouts.alert')
<!-- Search start -->
@php
    $searchFields = [
        ['value' => '', 'display' => 'All'],
        ['value' => 'title', 'display' => 'Title'],
        ['value' => 'author.name', 'display' => 'Author'],
        ['value' => 'published', 'display' => 'Published'],
        ['value' => 'created_at', 'display' => 'Created at'],
    ];
@endphp
@include('admin.layouts.search.index', $searchFields)
<!-- Search end -->
<!-- User Tables start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">@lang('Posts')</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a href="{{route('admin.posts.create')}}"><i class="icon-plus success"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover sortable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('Title')</th>
                                <th>@lang('Author')</th>
                                <th>@lang('Published')</th>
                                <th>@lang('Created at')</th>
                            </tr>
                        </thead>
                        <tbody id='result'>
                            @foreach ($posts as $index=>$post)
                                <tr data-id="{{$post->id}}">
                                    <th scope="row">{{$index+1}}</th>
                                    <td class="text-nowrap">{{$post->title}}</td>
                                    <td>{{$post->author->name}}</td>
                                    <td>{{$post->published}}</td>
                                    <td class="text-nowrap">{{$post->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-xs-right">
            {{ $posts->links() }}
        </div>
    </div>
</div>
<!-- order Tables end -->    

@endsection

@section('script')
    <script>
        // event click a post
        click_to_post();
        function click_to_post(){
            $('tr[data-id]').click(function(){
                var id = $(this).attr('data-id');
                var url = "{{route('admin.posts.show', ':id')}}";
                url = url.replace(':id', id);
                location.href = url;
            });
        }
    </script>
@endsection