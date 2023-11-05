<div class="mb-3">
<label for="{{$name}}">{{$placeholder}}</label>
<textarea id="{{$name}}" placeholder="{{$placeholder}}" name="{{$name}}" class="text">{!! isset($value) ? $value : old($name) !!}</textarea>
<x-validation-error field="{{$name}}" />
</div>
