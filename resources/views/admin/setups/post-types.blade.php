@extends('admin.layouts.main')

@section('title')
@lang('Post types')
@endsection

@section('body')

@include('admin.layouts.alert')

<!-- Form start -->
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-6">
            @php  
            $data = [
                'title' => 'Post types',
                'key' => 'post-types',
                'columns' => [['Id', 'id'], ['Name', 'name']],
                'rows' => $postTypes->toArray(),
                'name_route_update' => 'admin.post-types.update',
                'name_route_store' => 'admin.post-types.store',
                'name_route_destroy' => 'admin.post-types.destroy',
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