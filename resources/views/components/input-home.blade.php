<div class="mb-3">
    <label class="form-label">
        {{$label}}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="form-icon position-relative">
        {{ $slot }}
        <input type="{{$type}}" class="form-control ps-5" placeholder="{{$label}} " name="{{$name}}" @if ($required) required @endif>
    </div>
    <x-validation-error field="{{$name}}" />
</div>
