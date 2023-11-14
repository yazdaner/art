@section('script')
<script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>

@foreach ($names as $name)
CKEDITOR.replace({{$name}}, {
    language: 'fa',
    filebrowserUploadUrl: '{{ route('admin.editor-upload', ['_token' => csrf_token()]) }}',
    filebrowserUploadMethod: 'form'
});
@endforeach
</script>

@endsection
