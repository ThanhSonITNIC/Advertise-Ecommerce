@extends('admin.layouts.main')

@section('title')
@lang('Project')
@endsection

@section('body')

@include('admin.layouts.alert')

<!-- Form start -->
<section id="basic-form-layouts">
    <!-- About -->
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">@lang('Project')</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
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
                                            <label>@lang('Subtotal')</label>
                                            <input type="number" step="0.001" min="0" class="form-control" name="subtotal" value="{{$project->subtotal}}">
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
    
    <!-- Materials -->
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('Materials')</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <button type="button" class="btn-link cursor-pointer" data-toggle="modal" data-target="#addMaterialForm">
                                    <i class="icon-plus success"></i>
                                </button>
                            </li>
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover sortable mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class='text-nowrap'>@lang('Name')</th>
                                    <th>@lang('Price')</th>
                                    <th>@lang('Quantity')</th>
                                    <th>@lang('Unit')</th>
                                    <th>@lang('Description')</th>
                                </tr>
                            </thead>
                            <tbody id='result'>
                                @foreach ($project->materials as $index => $material)
                                    <tr data-toggle="modal" data-target="#editMaterialForm-{{$material->id}}">
                                        <th scope="row">{{$index+1}}</th>
                                        <td class='text-nowrap'>{{$material->material->name}}</td>
                                        <td>{{$material->price}}</td>
                                        <td>{{$material->quantity}}</td>
                                        <td class='text-nowrap'>{{$material->material->unit->name}}</td>
                                        <td class='text-nowrap'>{{$material->description}}</td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade text-xs-left" id="editMaterialForm-{{$material->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <form action="{{route('admin.project-materials.destroy', $material->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn-link cursor-pointer mr-2" type="submit"><i class="icon-trash danger"></i></button>
                                                    </form>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <label class="modal-title text-text-bold-600" id="myModalLabel33">@lang('Material')</label>
                                                </div>
                                                <form action="{{route('admin.project-materials.update', $material->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_material" value="{{$material->id_material}}">
                                                        <label>@lang('Name') </label>
                                                        <div class="form-group">
                                                            <a class="form-control" href="{{route('admin.materials.show', $material->id_material)}}">{{$material->material->name}}</a>
                                                        </div>
                                                        <label>@lang('Price') </label>
                                                        <div class="form-group">
                                                            <input type="number" name="price" step="0.001" min="0" class="form-control" value="{{$material->price}}" required>
                                                        </div>
                                                        <label>@lang('Quantity') </label>
                                                        <div class="form-group">
                                                            <input type="number" name="quantity" min="0" class="form-control" value="{{$material->quantity}}" required>
                                                        </div>
                                                        <label>@lang('Description') </label>
                                                        <div class="form-group">
                                                            <input type="text" name="description" class="form-control" value="{{$material->description}}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">@lang('Close')</button>
                                                        <button type="submit" class="btn btn-outline-primary">@lang('Save')</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade text-xs-left" id="addMaterialForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <label class="modal-title text-text-bold-600" id="myModalLabel33">@lang('Add material')</label>
                        </div>
                        <form action="{{route('admin.project-materials.store')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="text" name="id_project" hidden value="{{$project->id}}">
                                
                                <label>@lang('Material') </label>
                                <div class="form-group">
                                    <select class="selectpicker form-control" name="id_material" id="material" data-live-search="true" title="Select a material" data-hide-disabled="true" data-size="10" required></select>
                                </div>

                                <label>@lang('Price') </label>
                                <div class="form-group">
                                    <input type="number" name="price" min="0" step="0.001" class="form-control" required>
                                </div>
                                <label>@lang('Quantity') </label>
                                <div class="form-group">
                                    <input type="number" name="quantity" min="0" class="form-control" required>
                                </div>
                                <label>@lang('Description') </label>
                                <div class="form-group">
                                    <input type="text" name="description" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">@lang('Close')</button>
                                <button type="submit" class="btn btn-outline-primary">@lang('Add')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
        </div>
    </div>

    <!-- Content -->
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">@lang('Content')</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form form-editor" method="POST" action="{{route('admin.project-contents.update', $project->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
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

    @include('admin.projects.materials.create')

@endsection