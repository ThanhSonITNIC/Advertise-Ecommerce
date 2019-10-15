@extends('admin.layouts.main')

@section('body')

@include('admin.layouts.alert')
<!-- Search start -->
@php
    $searchFields = [
        ['value' => 'id', 'display' => 'Id'],
        ['value' => 'customer.name', 'display' => 'Customer'],
        ['value' => 'total', 'display' => 'Total'],
        ['value' => 'paid', 'display' => 'Paid'],
        ['value' => 'status.name', 'display' => 'Status'],
    ];
@endphp
@include('admin.layouts.search.index', $searchFields)
<!-- Search end -->
<!-- User Tables start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Projects</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover sortable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class='text-nowrap'>Customer</th>
                                <th>Budget</th>
                                <th>Paid</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id='result'>
                            @foreach ($projects as $index=>$project)
                                <tr data-id="{{$project->id}}">
                                    <th scope="row">{{$project->name}}</th>
                                    <td class='text-nowrap'>{{$project->customer}}</td>
                                    <td class='text-nowrap'>{{$project->price}}</td>
                                    <td>{{$project->paid}}</td>
                                    <td class='text-nowrap'>{{$project->status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-xs-right">
            {{-- {{ $projects->links() }} --}}
        </div>
    </div>
</div>
<!-- project Tables end -->    

@endsection

@section('script')
    <script>
         // event click a project
         click_to_project();
         function click_to_project(){
            $('tr[data-id]').click(function(){
                var id = $(this).attr('data-id');
                var url = "{{route('admin.projects.show', ':id')}}";
                url = url.replace(':id', id);
                location.href = url;
            });
         }
    </script>
@endsection