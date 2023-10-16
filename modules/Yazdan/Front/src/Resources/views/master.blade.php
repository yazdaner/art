{{--
<!DOCTYPE html>
<html lang="fa">

@include('Front::sections.head')

<body>
    --}}
    {{-- @include('Front::sections.navbar')

    @include('Front::sections.search') --}}


    {{-- @yield('content') --}}
    {{--
    @include('Front::sections.footer')

    @include('Front::sections.js')

    @include('Common::layouts.feedbacks') --}}
    {{-- </body>

</html> --}}

<!doctype html>
<html lang="fa" dir="rtl">

@include('Front::sections.head')

<body>
    @include('Front::sections.navbar')

    @yield('content')

    @include('Front::sections.footer')
    @include('Front::sections.search')
    @include('Front::sections.js')
</body>

</html>
