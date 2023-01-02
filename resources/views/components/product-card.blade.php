<div class="card">
    <img class="card-img-top" src="{{ asset($product->images->first()->path) }}" height="500">
    <div class="card-body">
        <h5 class="text-right"><strong>{{ $product->title }}</strong></h5>
        <h5 class="card-title">{{ $product->title }}</h5>
        <h5 class="card-text">{{ $product->description }}</h5>
        <p class="card-text"><strong>{{ $product->stock }}</strong></p>
    </div>
</div>
{{-- <h1>{{$product->title}} {{$product->id}}</h1>
<p>{{$product->description}}</p>
<p>{{$product->price}}</p>
<p>{{$product->stock}}</p>
<p>{{$product->status}}</p> --}}
