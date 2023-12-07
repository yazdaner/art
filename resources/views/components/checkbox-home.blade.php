<div class="mb-3">
    <label>{{$label}}</label>
    @foreach ($value as $item)
    <div class="form-check">
        <input @if(old($name) && in_array($item,old($name))) checked @endif name="{{$name}}[]" class="form-check-input" type="checkbox" value="{{$item}}"
            id="{{$item}}">
        <label class="form-check-label" for="{{$item}}">
            {{__($item)}}
        </label>
    </div>
    @endforeach
    <x-validation-error field="{{$name}}" />
</div>
