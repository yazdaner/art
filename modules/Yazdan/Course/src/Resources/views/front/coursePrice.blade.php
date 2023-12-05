<div class="variation-price">
    @if($course->sale_check)
    <span class="new">
        {{ number_format($course->price2) }}
        تومان
    </span>
    <span class="old">
        {{ number_format($course->price) }}
        تومان
    </span>
    @else
    <span class="mainPrice">
        {{ number_format($course->price) }}
        تومان
    </span>
    @endif
</div>
