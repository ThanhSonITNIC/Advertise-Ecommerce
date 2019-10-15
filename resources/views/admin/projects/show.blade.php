@extends('admin.layouts.main')

@section('body')

@include('admin.layouts.alert')

<!-- Info -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table table-bordered cursor-hand mb-0">
                        <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang('Customer')</th>
                                <th>@lang('Total')</th>
                                <th class="text-nowrap">@lang('Created at')</th>
                                <th>@lang('Status')</th>
                                <th class="text-nowrap">@lang('To step')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$project->id}}</td>
                                <td><a href="{{route('admin.users.show', $project->customer)}}">{{$project->customer}}</a></td>
                                <td>{{$project->total}}</td>
                                <td class="text-nowrap">{{$project->created_at}}</td>
                                <td>{{$project->status}}</td>
                                <td>
                                    <form name="to-step" action="{{route('admin.projects.update', $project->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <select id='status' name='id_status' class="form-control form-control-sm input-sm">
                                            {{-- @foreach ($project->type->status as $status)
                                                <option value="{{$status->id}}" @if($status->id == $project->id_status) selected @endif>{{$status->name}}</option>
                                            @endforeach --}}
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Info end --> 

<!-- Materials -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">@lang('Materials')</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover sortable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Quantity')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Total')</th>
                            </tr>
                        </thead>

                        <tbody id='result'>
                            @foreach ($project->materials as $index=>$material)
                                <tr data-id="{{$material->id_product}}"  data-toggle="modal" data-target="#product_{{$material->id_product}}">
                                    <th scope="row">{{$index+1}}</th>
                                    <td class="text-nowrap"><a href='{{route('admin.materials.show', 1)}}'>{{$material->material}}</a></td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->price}}</td>
                                    <td>{{$material->total}}</td>
                                </tr>

                                <div class="modal fade text-xs-left" id="product_{{$material->id_product}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <label class="modal-title text-text-bold-600">{{$material->material}}</label>
                                            </div>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id_order" value="{{$project->id}}">
                                                <div class="modal-body">
                                                    <label>@lang('Quantity'): </label>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="quantity" value="{{$material->quantity}}">
                                                    </div>
                                                    <label>@lang('Price'): </label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="price" value="{{$material->price}}">
                                                    </div>
                                                    <label>@lang('Color'): </label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="color" value="{{$material->color}}">
                                                    </div>
                                                    <label>@lang('Size'): </label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="size" value="{{$material->size}}">
                                                    </div>
                                                    <label>@lang('Note'): </label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="note" value="{{$material->note}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="@lang('Close')">
                                                    <input type="submit" class="btn btn-outline-primary" value="@lang('Save')">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Materials end -->    


<!-- Log -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">@lang('Logs')</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-nowrap">@lang('User')</th>
                                <th class="text-nowrap">@lang('Content')</th>
                                <th class="text-nowrap">@lang('At')</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($project->logs as $index=>$log)
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td class="text-nowrap">{{$log->id_status}}</td>
                                    <td>{{$log->amount}}</td>
                                    <td class="text-nowrap">{{$log->updated_by}}</td>
                                    <td class="text-nowrap">{{$log->created_at}}</td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Log end -->   

@endsection