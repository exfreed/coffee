<figure class="figure">
    <form action="{{route('basket-add', $product)}}" method="POST">
        @csrf
        <h1 class="h4 fw-normal text-center">{{$product->name}}</h1>
        <img src="{{$product->image}}" class="figure-img img-fluid rounded">
        <button class="w-100 btn btn-sm btn-secondary" type="submit">Добавить в корзину за {{$product->price}} ₽</button>
    </form>
</figure>