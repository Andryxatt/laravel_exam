@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if(empty($entity))
                        <div class="panel-heading">Create new product</div>
                    @else
                        <div class="panel-heading">Edit product</div>
                    @endif
                    <div class="panel-body">
                        <form action="@if(empty($entity)){{ route('products.store') }}@else{{ route('products.update', $entity->id) }}@endif" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @isset($entity)
                                {{ method_field('PUT') }}
                            @endisset
                            <div class="row">
                                @include('admin.fields.text', ['field' => 'slug', 'name' => 'Slug'])
                                @include('admin.fields.text', ['field' => 'model', 'name' => 'Model'])
                                @include('admin.fields.select', ['field' => 'marka_id', 'name' => 'Marka', 'options' => $markas])
                                @include('admin.fields.text', ['field' => 'price_by', 'name' => 'Price by'])
                                @include('admin.fields.text', ['field' => 'price_sale', 'name' => 'Price sale'])
                                @include('admin.fields.image', ['field' => 'image', 'name' => 'Image'])
                                @include('admin.fields.select', ['field' => 'provider_id', 'name' => 'Provider', 'options' => $providers])
                                @include('admin.fields.select', ['field' => 'sklad_id', 'name' => 'Sklad', 'options' => $sklads])
                                @include('admin.fields.text', ['field' => 'sizes', 'name' => 'Sizes'])
                            </div>
                            <input type="submit" value="save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection