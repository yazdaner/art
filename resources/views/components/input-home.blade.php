<div class="mb-3">
    <label class="form-label">
        {{$label}}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="form-icon position-relative">
        {{ $slot }}
        <input type="{{$type}}" value="{{$value ?? old($name)}}" placeholder="{{$label}} " name="{{$name}}" @if ($required) required @endif {{ $attributes->merge(['class' =>
        'form-control ps-5'])}}>
    </div>
    <x-validation-error field="{{$name}}" />
</div>
