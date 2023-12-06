<div class="mb-3">
    <label class="form-label">
        {{$label}}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="form-icon position-relative">
        {{ $slot }}
        <input type="file" class="file-upload" id="files" name="{{$name}}" @if($multiple) multiple @endif/>
    </div>
    <x-validation-error field="{{$name}}" />
</div>
