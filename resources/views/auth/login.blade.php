<x-app-layout title="Login">
    <x-slot name="heading"> Login </x-slot>
    <form action="/login" method="post">
        @csrf
        <div class="mt-3">
            <label for="email">Email</label>
            <input type="text" name="email" email="email" id="email" class="border rounded mt-1 py-1 px-2 block" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-3">
            <label for="password">Password</label>
            <input type="password" name="password" password="password" id="password" class="border rounded mt-1 py-1 px-2 block" value="{{ old('password') }}">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <x-button type="submit" class="mt-2">
            Login
        </x-button>
    </form>
</x-app-layout>
