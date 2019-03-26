@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form class="form-inline ml-auto">
                    <div class="md-form my-0">
                        <input id="search" name="search" class="search form-control" type="text" placeholder="Search" aria-label="Search">
                    </div>
                    <button class="btn btn-outline-white btn-md my-0 ml-sm-2" type="button">Search</button>
                </form>
                <hr>
                <p>Sizes</p>
                @foreach($sizes as $size)
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="materialGroupExample3" name="groupOfMaterialRadios">
                    <label class="form-check-label" for="materialGroupExample1">{{$size->name}}</label>
                </div>
                @endforeach
                <hr>
            </div>
           <div class="col-md-8">
                       <div class="card-group" id="test">
                           <div class="container">
                               <div class="row">
                                @foreach($products as $prod)
                               <div class="card col-md-4"  >
                                   <img class="card-img-top" src="{{ Storage::url($prod->image)}}" height="200px" alt="Card image cap">
                                   <div class="card-body">
                                       <h5 class="card-title">{{$prod->model}}</h5>
                                       <p class="card-text">{{$prod->price_sale}} uah.</p>
                                       <p class="card-text">{{$prod->marka->name}}</p>
                                       <p class="card-text">{{$prod->sizes}}</p>
                                       <a type="submit" class="btn btn-primary add_cart" href="{{route('shop.addToCart', ['id'=>$prod->id] )}}">Add to cart</a>
                                   </div>
                               </div>
                           @endforeach
                               </div>
                           </div>
                       </div>
                   </div>

        </div>
    </div>
@endsection
@section('script')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                console.log('123455');
                $.ajax({
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{URL::to('shop/search')}}',
                    data: 'search=' + $(this).val(),
                    success: function (data) {
                        $('#test').html(data);
                    }
                });
            });
        })
    </script>

@endsection
