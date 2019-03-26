@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">

                        <form action="{{ route('formmulti') }}" method="POST" >
                            {{ csrf_field() }}
                            @isset($entity)
                                {{ method_field('PUT') }}
                            @endisset
                            <div class="single-item">
                            @for($i=0;$i< count($files);$i++)
                                <div class="qwqw">
                                    {{--<input type="text" name="products[' . $i . '][model]">--}}
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8">
                                                @include('admin.fields.text', ['field' => 'products[' . $i . '][model]', 'name' => 'Model'])
                                                @include('admin.fields.select', ['field' => 'products[' . $i . '][marka_id]', 'name' => 'Marka', 'options' => $markas])
                                                @include('admin.fields.text', ['field' => 'products[' . $i . '][price_by]', 'name' => 'Price by'])
                                                @include('admin.fields.text', ['field' => 'products[' . $i . '][price_sale]', 'name' => 'Price sale'])
                                                <input type="hidden" value="{{$files[$i]}}" name='products[{{$i}}][image]'>
                                                @include('admin.fields.select', ['field' => 'products[' . $i . '][provider_id]', 'name' => 'Provider', 'options' => $providers])
                                                @include('admin.fields.select', ['field' => 'products[' . $i . '][sklad_id]', 'name' => 'Sklad', 'options' => $sklads])
                                                @include('admin.fields.select', ['field' => 'products[' . $i . '][size_id]', 'name' => 'Size', 'options'=>$sizes])
                                                @include('admin.fields.text', ['field' => 'products[' . $i . '][quantity]', 'name' => 'Count boxes'])
                                                @include('admin.fields.text', ['field' => 'products[' . $i . '][description]', 'name' => 'Description'])
                                            </div>
                                           <div class="col-md-4">
                                               <div ><img style="display: block;" src="{{ Storage::url($files[$i])}}" height="300px" alt=""></div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endfor
                            </div>
                            <div>
                                <input type="submit" value="save">
                            </div>

                        </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
@endpush


@section('adminlte_js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script type="application/javascript">
        // $('.single-item').slick();
    </script>
@endsection