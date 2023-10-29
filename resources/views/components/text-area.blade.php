<div class="mt-3">
<label>{{$placeholder}}</label>
<textarea placeholder="{{$placeholder}}" name="{{$name}}" class="text">{!! isset($value) ? $value : old($name) !!}</textarea>
<x-validation-error field="{{$name}}" />
</div>
