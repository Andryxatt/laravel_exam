<div class="container">
    <div class="row">
@foreach($products as $prod)
        <div class="card col-md-4"  style=" ">
            <img class="card-img-top" src="{{ Storage::url($prod->image)}}" height="200px" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$prod->model}}</h5>
                <p class="card-text">{{$prod->price_sale}} uah.</p>
                <p class="card-text">{{$prod->marka_id}}</p>
                <p class="card-text">{{$prod->sizes}}</p>
                <a type="submit" class="btn btn-primary add_cart" href="{{route('shop.addToCart', ['id'=>$prod->id] )}}">Add to cart</a>
            </div>
        </div>
@endforeach
    </div>
</div>