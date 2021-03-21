<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Profile') }}
        </h2>
    </x-slot>

    @section('mainContent')
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                {{ __('Detail for: ') }}
            </div>
            <div>
                <h3>{{ $company->name }}</h3>
            </div>
            <br>
            <div class="row mt-3">
                <div class="col-12">
                    <p><strong>{{ __('Company Name: ') }}</strong> {{ $company->name }}</p>
                    <p><strong>{{ __('Email: ') }}</strong> {{ $company->email }}</p>
                    <p><strong>{{ __('Website: ') }}</strong>{{ $company->website }}</p>
                </div>
            </div>

            @if($company->photo)
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('storage/uploads/'. $company->photo) }}" alt="Company Logo" class="img-thumbnail">
                    </div>
                </div>
            @endif
        </div>
    @endsection
</x-app-layout>
