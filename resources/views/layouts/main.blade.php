<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset("css/$css") }}">

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    {{-- notifikasi --}}
    @if (session('notifikasi'))
        @include('notifikasi')
    @endif
    {{-- akhir notifikasi --}}

    {{-- aside --}}
    @include('partials.aside')
    {{-- akhir aside --}}

    {{-- main --}}
    <main>
        {{-- nav --}}
        @include('partials.navbar')
        {{-- akhir nav --}}

        @if (auth()->user()->role == 'admin')
            @yield('content')
        @else
            @yield('content-2')
        @endif
    </main>
    {{-- ahir main --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/responsive.js') }}"></script>
</body>

</html>
