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
                <h3>{{ $user->name }}</h3>
            </div>
            <br>
            <div class="col-12">
                <p><a class="btn btn-success" href="{{ route('admins.user.edit', $user) }}">{{ __('Edit') }}</a></p>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <p><strong>{{ __('First Name: ') }}</strong> {{ $user->name }}</p>
                    <p><strong>{{ __('Last Name: ') }}</strong> {{ $user->lastName }}</p>
                    <p><strong>{{ __('Work For: ') }}</strong> {{ $user->company_name }}</p>
                    <p><strong>{{ __('Email: ') }}</strong> {{ $user->email }}</p>
                </div>
            </div>

            @if($user->photo)
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('storage/uploads/'. $user->photo) }}" alt="Company Logo" class="img-thumbnail">
                    </div>
                </div>
            @endif
        </div>
    @endsection
</x-app-layout>
