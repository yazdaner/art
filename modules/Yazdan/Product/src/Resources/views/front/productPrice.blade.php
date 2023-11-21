<div class="variation-price">
    @if($product->quantity_check)
    @if($product->sale_check)
    <span class="new">
        {{ number_format($product->sale_check->price2) }}
        تومان
    </span>
    <span class="old">
        {{ number_format($product->sale_check->price) }}
        تومان
    </span>
    @else
    <span class="mainPrice">
        {{ number_format($product->price_check->price) }}
        تومان
    </span>
    @endif
    @else
    <div class="not-in-stock">
        <p class="mt-2">ناموجود</p>
    </div>
    @endif
</div>
