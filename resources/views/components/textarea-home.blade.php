<div class="mb-3">
    <label class="form-label">
        {{$label}}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="form-icon position-relative">
        {{ $slot }}
        <textarea name="{{$name}}" rows="4" placeholder="{{$label}}" {{ $attributes->merge(['class' => 'form-control ps-5'])}}>{{$value ?? old($name)}}</textarea>
    </div>
    <x-validation-error field="{{$name}}" />
</div>
