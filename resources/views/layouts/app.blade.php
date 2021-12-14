@include('layouts.dashboard.header')

@include('layouts.dashboard.sidebar')

        <div class="min-h-screen bg-gray-100">
            @include('layouts.dashboard.parts.navbar')

            <!-- Page Content -->
            <main class="admin-main">
                {{ $slot }}
            </main>
        </div>

@include('layouts.dashboard.footer')
