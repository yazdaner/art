<div class="mb-3">
    <label>{{$placeholder}}</label>
    <select name="{{$name}}">
        <option value="">{{$placeholder}}</option>
        {{ $slot }}
    </select>
    <x-validation-error field="{{$name}}" />
</div>
