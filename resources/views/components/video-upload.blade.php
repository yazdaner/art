<div class="mb-3">
    <label>{{$placeholder}}</label>
    <div class="file-upload">
        <div class="i-file-upload">
            <span>{{$placeholder}}</span>
            <input type="file" class="file-upload" id="files" name="{{$name}}" />
        </div>
        <span class="filesize"></span>
        @if (isset($value))
        <video width="20%" controls class="mt-3">
            <source src="{{$value->download()}}" type="video/mp4">
        </video>
        {{$value->filename}}
        @else
        <span class="selectedFiles">فایلی انتخاب نشده است</span>
        @endif
    </div>
    <x-validation-error field="{{$name}}" />
</div>
