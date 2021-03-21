<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies Profile') }}
        </h2>
    </x-slot>

    @section('mainContent')
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

            <div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('Company Name') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ __('Website') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    <div>
                                        <p><a class="btn btn-primary" href="{{ route('admins.company.show', $company->id) }}">{{ __('Show') }}</a></p>
                                    </div>
                                    <div>
                                        <p><a class="btn btn-success" href="{{ route('admins.company.edit', ['company' => $company]) }}">{{ __('Edit') }}</a></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{ $companies->links() }}

    @endsection
</x-app-layout>
