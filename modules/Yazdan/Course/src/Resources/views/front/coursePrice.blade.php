<p>قیمت دوره :
    @if (is_array($course->getPrice()))
        <span class="text-muted"><del>{{$course->getPrice()['price']}}</del></span>
        <span class="text-danger"><strong>{{$course->getPrice()['price2']}}</strong></span>
    @else
        <span>{{$course->getPrice()}}</span>
    @endif
</p>
