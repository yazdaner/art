<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{csrf_token()}}">
    <title>Tandorfia - تاندورفیا</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/panel/css/style.css">
    <link rel="stylesheet" href="/panel/css/responsive_991.css" media="(max-width:991px)">
    <link rel="stylesheet" href="/panel/css/responsive_768.css" media="(max-width:768px)">
    <link rel="stylesheet" href="/panel/css/font.css">
    <link rel="stylesheet" href="{{asset('panel/css/custom.css')}}">
    @yield('style')

</head>
<body>
    @include('Dashboard::sections.sidebar')
<div class="content">
    @include('Dashboard::sections.header')

    @include('Dashboard::sections.breadcrumb')
    @yield('content')
</div>

</body>
<script src="/panel/js/jquery-3.4.1.min.js"></script>
<script src="/panel/js/js.js"></script>
@include('Common::layouts.feedbacks');
@yield('script')

</html>
