<x-app-layout title="{{ $meta_page['title'] }}">
    <x-slot name="heading"> {{ $meta_page['title'] }} </x-slot>
    <form action="{{ $meta_page['url'] }}" method="post">
        @csrf
        @method($meta_page['method'])
        <div class="mt-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="border rounded mt-1 py-1 px-2 block" value="{{ old('name', $user->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-3">
            <label for="email">Email</label> 
            <input type="email" name="email" id="email" class="border rounded mt-1 py-1 px-2 block" value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="border rounded mt-1 py-1 px-2 block">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <x-button class="mt-2">
            {{ $meta_page['button'] }}
        </x-button>
    </form>
</x-app-layout>
