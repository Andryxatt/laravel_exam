@extends('adminlte::page')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@section('content')
    <div class="row pull-right">
        <div class="col-md-12">
            <a type="submit" class="btn btn-primary" href="{{route('products.create')}}">Create product</a>
            <form method="post" action="{{url('form')}}"  enctype="multipart/form-data">
                {{csrf_field()}}
                    <input type="file" name="filename[]" id="files" multiple>
                    <button disabled="disabled" id="submitMulti" class="btn btn-primary" type="submit">Multiple create</button>
            </form>
        </div>

    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>
                    <div class="panel-body">
                        @if($products->count() > 0)
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Model</th>
                                    <th>Marka</th>
                                    <th>Price by</th>
                                    <th>Price sale</th>
                                    <th>Image</th>
                                    <th>Provider</th>
                                    <th>Sklad</th>
                                    <th>Sizes</th>
                                    <td>Quantity</td>
                                    <td>Description</td>
                                </tr>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->model }}</td>
                                        <td>{{ $product->marka_id }}</td>
                                        <td>{{ $product->price_by }}</td>
                                        <td>{{ $product->price_sale }}</td>

                                        <td><img src="{{ Storage::url($product->image)}}" height="50px" alt=""></td>
                                        <td>{{ $product->provider_id }}</td>
                                        <td>{{ $product->sklad_id }}</td>
                                        <td>{{ $product->size_id }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                <a type="button" class="btn btn-default" href="{{ route('products.edit', $product->id) }}">edit</a>
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            No products
                        @endif
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript">

        $(document).ready(function() {
          $('#files').on('change',function () {
              $('#submitMulti').prop('disabled', false);
          })
        });

    </script>
@endsection