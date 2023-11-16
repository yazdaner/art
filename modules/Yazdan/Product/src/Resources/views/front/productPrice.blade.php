<p>قیمت دوره :
    @if (is_array($product->getPrice()))
        <span class="text-muted"><del>{{$product->getPrice()['price']}}</del></span>
        <span class="text-danger"><strong>{{$product->getPrice()['price2']}}</strong></span>
    @else
        <span>{{$product->getPrice()}}</span>
    @endif
</p>
