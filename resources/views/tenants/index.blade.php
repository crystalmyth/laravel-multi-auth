<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-right">
                <x-button-link :href="route('tenants.create')">Add Tenant</x-button-link>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto w-full text-center">
                    <thead>
                        <tr>
                            <th class="border-b py-3">Name</th>
                            <th class="border-b py-3">Email</th>
                            <th class="border-b py-3">Contact</th>
                            <th class="border-b py-3">Domain</th>
                            <th class="border-b py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tenants as $tenant)
                            <tr>
                                <td class="border-b py-3">{{ $tenant->name }}</td>
                                <td class="border-b py-3">{{ $tenant->email }}</td>
                                <td class="border-b py-3">{{ $tenant->contact }}</td>
                                <td class="border-b py-3">{{ $tenant->domain }}</td>
                                <td class="border-b py-3">
                                    <div class="flex">
                                        <a href="{{ route('tenants.edit', $tenant->id) }}" class="border border-blue-500 bg-blue-500 text-white font-bold text-sm p-1 rounded">Edit</a>
                                        <form action="{{ route('tenants.destroy', $tenant->id) }}" class="ml-2" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Are You Sure ?')" class="border border-red-500 bg-red-500 text-white font-bold text-sm p-1 rounded">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="py-3">No Tenant Found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
