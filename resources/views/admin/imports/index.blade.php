@extends('admin.layouts.main')

@section('body')

@include('admin.layouts.alert')
<!-- Search start -->
@php
    $searchFields = [
        ['value' => '', 'display' => 'All'],
        ['value' => 'material.name', 'display' => 'Material'],
        ['value' => 'price', 'display' => 'Price'],
        ['value' => 'quantity', 'display' => 'Quantity'],
        ['value' => 'description', 'display' => 'Description'],
        ['value' => 'user.name', 'display' => 'By'],
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
                <h4 class="card-title">Imports</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a href="{{route('admin.import-materials.create')}}"><i class="icon-plus success"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('Material')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Quantity')</th>
                                <th>@lang('Description')</th>
                                <th>@lang('By')</th>
                                <th>@lang('Created at')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($imports as $index => $import)
                                <tr>
                                    <td class="row">{{$index+1}}</td>
                                    <td class="text-nowrap"><a href="{{route('admin.materials.show', $import->material->id)}}">{{$import->material->name}}</a></td>
                                    <td class="text-nowrap">{{$import->price}}</td>
                                    <td class="text-nowrap">{{$import->quantity}}</td>
                                    <td class="text-nowrap">{{$import->description}}</td>
                                    <td class="text-nowrap"><a href="{{route('admin.users.show', $import->user->id)}}">{{$import->user->name}}</a></td>
                                    <td class="text-nowrap">{{$import->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-xs-right">
            {{ $imports->links() }}
        </div>
    </div>
</div>
<!-- order Tables end -->    

@endsection
