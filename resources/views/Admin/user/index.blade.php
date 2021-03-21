<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Profile') }}
        </h2>
    </x-slot>

    @section('mainContent')
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

            <div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('First Name') }}</th>
                        <th scope="col">{{ __('Last Name') }}</th>
                        <th scope="col">{{ __('Company Word For') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastName }}</td>
                            <td>{{ $user->company_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    <div>
                                        <p><a class="btn btn-primary" href="{{ route('admins.user.show', $user->id) }}">{{ __('Show') }}</a></p>
                                    </div>
                                    <div>
                                        <p><a class="btn btn-success" href="{{ route('admins.user.edit', $user->id) }}">{{ __('Edit') }}</a></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{ $users->links() }}

    @endsection
</x-app-layout>
