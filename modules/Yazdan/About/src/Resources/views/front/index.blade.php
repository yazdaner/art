@extends('Front::master')
@section('content')
<section class="m-y-100">
    <div class="container">
        <div class="row px-3">
            {!! $about->body !!}
        </div>
    </div>
</section>
@endsection
