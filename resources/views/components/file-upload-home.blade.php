<div class="mb-3">
    <label class="form-label">
        {{$label}}
    </label>
    <div class="form-icon position-relative">
        {{ $slot }}
        <input type="file" id="files" name="{{$name}}" @if($multiple) multiple @endif {{ $attributes->merge(['class' =>
        'form-control'])}} />
    </div>
    <x-validation-error field="{{$name}}" />
</div>
