@extends('admin.layouts.main')

@section('body')

@include('admin.layouts.alert')

<!-- Form start -->
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-6">
            @php  
            $data = [
                'title' => 'Project types',
                'key' => 'project-types',
                'columns' => [['Id', 'id'], ['Name', 'name']],
                'rows' => $projectTypes->toArray(),
                'name_route_update' => 'admin.project-types.update',
                'name_route_store' => 'admin.project-types.store',
                'name_route_destroy' => 'admin.project-types.destroy',
                'controls' => [
                    ['name' => 'id', 'title' => 'Id', 'properties' => 'maxlength=30 required'],
                    ['name' => 'name', 'title' => 'Name', 'properties' => 'required'],
                ],
                'update' => true,
                'delete' => true,
                'create' => true
            ];
            @endphp
            @include('admin.layouts.forms.form', $data)
        </div>
    </div>
</section>

@endsection