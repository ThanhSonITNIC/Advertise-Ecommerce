@extends('admin.layouts.main')

@section('title')
@lang('Material')
@endsection

@section('body')

@include('admin.layouts.alert')

<!-- Form start -->
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">@lang('Material')</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form form-editor" method="POST" action="{{route('admin.materials.store')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('ID')</label>
                                            <input class="form-control" type="text" name="id" maxlength="30" value="{{old('id')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Name')</label>
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Price')</label>
                                            <input class="form-control" type="number" step="0.001" name="price" value="{{old('price')}}" min="0" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('Unit')</label>
                                            <select name="id_unit" class="form-control" required>
                                                @foreach ($units as $unit)
                                                    <option 
                                                        value="{{$unit->id}}" 
                                                        @if(old('id_unit') == $unit->id) 
                                                            selected 
                                                        @elseif(request()->has('unit'))
                                                            @if(request()->unit == $unit->id)
                                                            selected 
                                                            @endif
                                                        @endif>
                                                        @lang($unit->name)
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>@lang('Description')</label>
                                            <input type="text" class="form-control" name="description" value="{{old('description')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> @lang('Create')
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
