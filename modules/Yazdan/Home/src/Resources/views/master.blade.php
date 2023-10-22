@extends('Front::master')
@section('content')
@include('Home::sections.avatar')
<!-- Profile Start -->
<section class="section mt-60">
    <div class="container mt-lg-3">
        <div class="row">
            @include('Home::sections.sidebar')
            @yield('homeContent')
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->

@endsection
