<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @if (View::hasSection('has-vue'))
        <script>
            window.defaultLocale = "{{ config('app.locale') }}";
            window.fallbackLocale = "{{ config('app.fallback_locale') }}";
            window.languageResourceVersion = "{{ rspr::vers('app/public/lang/language-resource.json', true, true) }}";
        </script>
        <script src="{{ rspr::vers('js/vue-component.js') }}"></script>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
        </script>
    @endif

    @vite(['resources/css/compile.css', 'resources/js/compile.js'])
    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-page="{{ Route::currentRouteName() }}">
    <div class="wrapper">
        @include('layouts.common.loading')
        @include('layouts.common.header')
        @include('layouts.common.aside')

        <div class="content-wrapper text-center p-2">
            @yield('content')
        </div>
        @include('layouts.common.footer')
    </div>
    {{-- @include('assets.js.common.asset-js-toastr-message')
    <script src="{{ rspr::vers('js/app.js') }}" defer></script> --}}
    @stack('js')
</body>

</html>
