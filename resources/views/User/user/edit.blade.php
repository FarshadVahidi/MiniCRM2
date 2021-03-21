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

            <form class="row g-3" action="{{ route('users.user.edit', $user)}}" enctype="multipart/form-data">
                @method('PATCH')
                <div class="col-md-6">
                    <label for="name" class="form-label">{{ __('First Name') }}</label>
                    <input type="text" class="form-control" id="name" required value="{{ old('name') ?? $user->name }}">
                    <div>{{ $errors->first('name') }}</div>
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">{{ __('Last Name') }}</label>
                    <input type="text" class="form-control" id="lastName" required value="{{ old('lastName') ?? $user->lastName }}">
                    <div>{{ $errors->first('lastName') }}</div>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required value="{{ old('email') ?? $user->email }}">
                    <div>{{ $errors->first('email') }}</div>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">{{ __('Phone') }}</label>
                    <input type="text" class="form-control" id="phone" required value="{{ old('phone') ?? $user->phone }}">
                    <div>{{ $errors->first('phone') }}</div>
                </div>

                @if($user->photo)
                    <figure class="container pt-6">
                        <img src="{{ asset('storage/uploads/'. $user->photo) }}" class="figure-img img-fluid img-thumbnail" alt="User profile photo" width="300", height="300">
                    </figure>
                @endif

                <div class="form-group d-flex flex-column">
                    <label for="photo" class="py-2">{{ __('Photo') }}</label>
                    <input type="file" name="photo" class="py-2" value="{{ old('photo') ?? $user->photo }}">
                    <div>{{ $errors->first('photo') }}</div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    @endsection
</x-app-layout>
