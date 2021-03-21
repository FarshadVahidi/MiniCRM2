<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    @section('mainContent')
        <div class="row">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="alert alert-success" role="alert">
                    @if(Session::has('message'))
                        {{ Session::get('message') }}
                    @endif
                </div>
            </div>
        </div>

    @endsection
</x-app-layout>
