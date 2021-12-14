@include('layouts.dashboard.header')

@include('layouts.dashboard.sidebar')

<main class="admin-main">
@include('layouts.dashboard.parts.navbar')

    @yield('content')
</main>

@include('layouts.dashboard.footer')
