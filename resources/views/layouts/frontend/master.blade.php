<!DOCTYPE html>
<html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('asset_admin/assets/css/bootstrap.min.css')}}">
    </head>

    @include('layouts.frontend.navbar')

    <body>
        <div class="container">
            <div class="row">
                @include('layouts.flash')
                @yield('body')
            </div>
        </div>
    </body>

    <script src="{{ asset('asset_admin/assets/js/bootstrap.min.js')}}"></script>
</html>
