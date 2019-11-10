@extends('admin.layouts.main')

@section('title')
@lang('Materials')
@endsection

@section('body')

@include('admin.layouts.alert')
<!-- Search start -->
@php
    $searchFields = [
        ['value' => '', 'display' => 'All'],
        ['value' => 'id', 'display' => 'Id'],
        ['value' => 'name', 'display' => 'Name'],
        ['value' => 'price', 'display' => 'Price'],
        ['value' => 'quantity', 'display' => 'Quantity'],
        ['value' => 'unit.name', 'display' => 'Unit'],
        ['value' => 'description', 'display' => 'Description'],
    ];
@endphp
@include('admin.layouts.search.index', $searchFields)
<!-- Search end -->
<!-- User Tables start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">@lang('Materials')</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a href="{{route('admin.materials.create')}}"><i class="icon-plus success"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover sortable">
                        <thead>
                            <tr>
                                <th>@lang('Id')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Quantity')</th>
                                <th>@lang('Unit')</th>
                                <th>@lang('Description')</th>
                            </tr>
                        </thead>
                        <tbody id='result'>
                            @foreach ($materials as $material)
                                <tr data-id="{{$material->id}}">
                                    <th scope="row">{{$material->id}}</th>
                                    <td class="text-nowrap">{{$material->name}}</td>
                                    <td class="text-nowrap">{{$material->price}}</td>
                                    <td class="text-nowrap">{{$material->quantity}}</td>
                                    <td class="text-nowrap">{{$material->unit->name}}</td>
                                    <td class="text-nowrap">{{$material->description}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-xs-right">
            {{ $materials->links() }}
        </div>
    </div>
</div>
<!-- order Tables end -->    

@endsection

@section('script')
    <script>
        // event click a post
        click_to_material();
        function click_to_material(){
            $('tr[data-id]').click(function(){
                var id = $(this).attr('data-id');
                var url = "{{route('admin.materials.show', ':id')}}";
                url = url.replace(':id', id);
                location.href = url;
            });
        }
    </script>
@endsection