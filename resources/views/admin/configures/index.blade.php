@extends('admin.layouts.main')

@section('body')

@include('admin.layouts.alert')

<!-- Form start -->
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-6">
            @php  
            $data = [
                'title' => 'Configures',
                'key' => 'configures',
                'columns' => [['Key', 'key'], ['Value', 'value']],
                'rows' => $configures->toArray(),
                'name_route_update' => 'admin.configures.update',
                'name_route_store' => 'admin.configures.store',
                'controls' => [
                    ['name' => 'key', 'title' => 'Key', 'properties' => 'maxlength=30 required'],
                    ['name' => 'value', 'title' => 'Value', 'properties' => 'required'],
                ],
                'update' => true,
                'delete' => false,
                'create' => true
            ];
            @endphp
            @include('admin.layouts.forms.form', $data)
        </div>
    </div>
</section>

@endsection