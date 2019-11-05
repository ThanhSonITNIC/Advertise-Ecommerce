@extends('admin.layouts.main')

@section('body')

@include('admin.layouts.alert')

<!-- Form start -->
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">@lang('Project')</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form form-editor" method="POST" action="{{route('admin.projects.update', $project->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Name')</label>
                                            <input class="form-control" type="text" name="name" value="{{$project->name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Slug')</label>
                                            <input type="text" class="form-control" name="slug" value="{{$project->slug}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Customer')</label>
                                            <input class="form-control" type="text" name="id_customer" value="{{$project->id_customer}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Budget')</label>
                                            <input type="number" step="0.001" class="form-control" name="budget" value="{{$project->budget}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang('Start at')</label>
                                            <input class="form-control" type="date" name="start_at" value="{{$project->start_at}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang('Finish at')</label>
                                            <input type="date" class="form-control" name="finish_at" value="{{$project->finish_at}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang('Finished at')</label>
                                            <input type="date" class="form-control" name="finished_at" value="{{$project->finished_at}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang('Type')</label>
                                            <select name="id_type" class="form-control">
                                                @foreach ($projectTypes as $type)
                                                    <option 
                                                        value="{{$type->id}}" 
                                                        @if($project->id_type == $type->id) 
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
                                                    <input type="checkbox" class="custom-control-input" name="highlight" @if($project->highlight) checked @endif>
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
                                                    <input type="checkbox" class="custom-control-input" name="published" @if($project->published) checked @endif>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>@lang('Description')</label>
                                            <textarea rows="5" class="form-control" name="description" >{{$project->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>@lang('Image')</label>
                                            <div>
                                                <input type="text" hidden name="image" value="{{$project->image}}">
                                                <input id="image" type="file" hidden accept="image/*" class="custom-file-input">
                                                <label for="image" class="w-100">
                                                    <img id="review" class="img-fluid form-control" style="height:100px" src="{{$project->watermark()}}" alt="Choose image">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>@lang('Tags')</label>
                                            <input type="text" class="form-control tags" name="tags" value="{{$project->tags}}" data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Materials</h4>
                                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                <div class="heading-elements">
                                                    <ul class="list-inline mb-0">
                                                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body collapse in">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover sortable mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th class='text-nowrap'>Name</th>
                                                                <th>Price</th>
                                                                <th>Quantity</th>
                                                                <th>Unit</th>
                                                                <th>Description</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id='result'>
                                                            @foreach ($project->materials as $index => $material)
                                                                <tr data-id="{{$material->id}}">
                                                                    <th scope="row">{{$index+1}}</th>
                                                                    <td class='text-nowrap'>{{$material->name}}</td>
                                                                    <td>{{$material->price}}</td>
                                                                    <td>{{$material->quantity}}</td>
                                                                    <td class='text-nowrap'>{{$material->unit->name}}</td>
                                                                    <td class='text-nowrap'>{{$material->description}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Content</h4>
                                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body collapse in">
                                        <div class="form-group mb-0">
                                            <input type="text" name='content' value="{{$project->content}}" hidden>
                                            <div id="toolbar-container"></div>
                                            <div id="editor" class="form-control"></div>
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