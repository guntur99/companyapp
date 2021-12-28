<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4 class="">
                            You're logged as {{ Auth::user()->role_id == 2 ? 'User' : 'Admin' }}!
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
