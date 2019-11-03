@extends('admin.layouts.main')

@section('body')

@include('admin.layouts.alert')

<!-- Form start -->
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">@lang('Post')</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete" class="btn-link"><a><i class="icon-trash danger"></i></a></button>
                                </form>
                            </li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form form-editor" method="POST" action="{{route('admin.posts.update', $post->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Title')</label>
                                            <input class="form-control" type="text" name="title" value="{{$post->title}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Slug')</label>
                                            <input type="text" class="form-control" name="slug" value="{{$post->slug}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>@lang('Description')</label>
                                            <textarea rows="5" class="form-control" name="description" >{{$post->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>@lang('Image')</label>
                                            <div>
                                                <input type="text" hidden name="image" value="{{$post->image}}">
                                                <input id="image" type="file" hidden accept="image/*" class="custom-file-input">
                                                <label for="image" class="w-100">
                                                    <img id="review" class="img-fluid form-control" style="height:100px" src="{{$post->watermark()}}" alt="Choose image">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('Content')</label>
                                    <input type="text" name='content' value="{{$post->content}}" hidden>
                                    <div id="toolbar-container"></div>
                                    <div id="editor" class="form-control"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>@lang('Tags')</label>
                                            <input type="text" class="form-control tags" name="tags" value="{{$post->tags}}" data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang('Type')</label>
                                            <select name="id_type" class="form-control">
                                                @foreach ($postTypes as $type)
                                                    <option 
                                                        value="{{$type->id}}" 
                                                        @if($post->id_type == $type->id) 
                                                            selected
                                                        @endif>
                                                        {{$type->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang('Highlight')</label>
                                            <div class="form-control">
                                                <label class="custom-control custom-checkbox mb-0">
                                                    <input type="checkbox" class="custom-control-input" name="highlight" @if($post->highlight) checked @endif>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang('Publish')</label>
                                            <div class="form-control">
                                                <label class="custom-control custom-checkbox mb-0">
                                                    <input type="checkbox" class="custom-control-input" name="published" @if($post->published) checked @endif>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> @lang('Save')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Form end --> 

@endsection

@section('script')

    @include('admin.layouts.editor.ckeditor5')

    @include('admin.layouts.components.image-upload', ['url' => route('admin.upload.post')])

@endsection