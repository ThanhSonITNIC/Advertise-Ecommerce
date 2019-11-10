@extends('admin.layouts.main')

@section('body')

@include('admin.layouts.alert')

<!-- Form start -->
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-6">
            @php  
            $data = [
                'title' => 'Levels',
                'key' => 'levels',
                'columns' => [['Id', 'id'], ['Name', 'name']],
                'rows' => $levels->toArray(),
                'name_route_update' => 'admin.levels.update',
                'name_route_store' => 'admin.levels.store',
                'name_route_destroy' => 'admin.levels.destroy',
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