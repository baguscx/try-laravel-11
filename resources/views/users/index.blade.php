<x-app-layout title="users">
    <x-slot name="heading"> users </x-slot>
    <div class="sm:flex sm:items-center">
        <x-section-title>
            <x-slot name="title">Users</x-slot>
            <x-slot name="description">A list of all the users in your account including their name, title,
            email and role.</x-slot>
        </x-section-title>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <x-button class="" as="a" href="{{route('users.create')}}" >
                Add User
            </x-button>
        </div>
    </div>
        <x-table.index>
            <x-table.thead>
                <tr>
                    <x-table.th scope="col">#</x-table.th>
                    <x-table.th scope="col">Name</x-table.th>
                    <x-table.th scope="col">Email</x-table.th>
                    <x-table.th scope="col">Created At</x-table.th>
                    <x-table.th scope="col"><span class="sr-only">Edit</span></x-table.th>
                </tr>
            </x-table.thead>
            <x-table.tbody>
                 @foreach ($users as $user)
                    <tr>
                        <x-table.td> {{ $loop->iteration }} </x-table.td>
                        <x-table.td> {{ $user->name }} </x-table.td>
                        <x-table.td> {{ $user->email }} </x-table.td>
                        <x-table.td> {{ $user->created_at->diffForHumans() }} </x-table.td>
                        <x-table.td>
                            <a href="users/{{ $user->id }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                            <a href="users/{{ $user->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.index>
</x-app-layout>
