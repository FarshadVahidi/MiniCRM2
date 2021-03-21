<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Companies Profile') }}
        </h2>
    </x-slot>

    @section('mainContent')
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <h3>Companies Info</h3>
        </div>
    @endsection
</x-app-layout>
