<div class="mb-3">
    <label>{{$label}}</label>
    <select name="{{$name}}" {{ $attributes->merge(['class' => 'form-control']) }}>
        <option value="">{{$label}}</option>
        {{ $slot }}
    </select>
    <x-validation-error field="{{$name}}" />
</div>
