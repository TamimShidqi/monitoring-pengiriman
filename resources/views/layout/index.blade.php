<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout/style')
    @yield('styles')
    <title>@yield('titles')</title>
    <title>@yield('title')</title>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div id="loading" style="display:none"></div>

    <div class="wrapper">
        {{-- ini header --}}
        @includeIf('layout/header')
        {{-- ini sidebar --}}
        @includeIf('layout/sidebar')

        <div class="content-wrapper">
            {{-- @stack('before-content') --}}
            @yield('content')
            {{-- @stack('after-content') --}}
        </div>

        {{-- @includeIf('layout/footer') --}}
    </div>

    @includeIf('layout/script')

    {{-- Tambah --}}
    @stack('scripts')

</body>

</html>
