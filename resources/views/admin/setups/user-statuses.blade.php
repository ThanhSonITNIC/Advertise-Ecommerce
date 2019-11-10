@extends('admin.layouts.main')

@section('title')
@lang('User statuses')
@endsection

@section('body')

@include('admin.layouts.alert')

<!-- Form start -->
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-6">
            @php  
            $data = [
                'title' => 'User statuses',
                'key' => 'user-statuses',
                'columns' => [['Id', 'id'], ['Name', 'name']],
                'rows' => $userStatuses->toArray(),
                'name_route_update' => 'admin.user-statuses.update',
                'name_route_store' => 'admin.user-statuses.store',
                'name_route_destroy' => 'admin.user-statuses.destroy',
                'controls' => [
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