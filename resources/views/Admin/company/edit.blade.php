<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    @section('mainContent')
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <h3>User Info</h3>
            </div>

            <form class="row g-3" action="{{ route('admins.company.update', ['company' => $company])}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                <div class="col-md-6">
                    <label for="name" class="form-label">{{ __('Company Name') }}</label>
                    <input type="text" class="form-control" name="name" required="required" value="{{ old('name') ?? $company->name }}">
                    <div>{{ $errors->first('name') }}</div>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required="required" value="{{ old('email') ?? $company->email }}">
                    <div>{{ $errors->first('email') }}</div>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">{{ __('Website') }}</label>
                    <input type="text" class="form-control" name="website" required="required" value="{{ old('website') ?? $company->website }}">
                    <div>{{ $errors->first('website') }}</div>
                </div>

                @if($company->photo)
                    <figure class="container pt-6">
                        <img src="{{ asset('storage/uploads/'. $company->photo) }}" class="figure-img img-fluid img-thumbnail" alt="User profile photo" width="300", height="300">
                    </figure>
                @endif

                <div class="form-group d-flex flex-column">
                    <label for="photo" class="py-2">{{ __('Photo') }}</label>
                    <input type="file" name="photo" class="py-2" value="{{ old('photo') ?? $company->photo }}">
                    <div>{{ $errors->first('company') }}</div>
                </div>

                @csrf

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    @endsection
</x-app-layout>
