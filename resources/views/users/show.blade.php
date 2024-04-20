<x-app-layout title="{{$user->name}}">
    <x-slot name="heading"> {{$user->name}} </x-slot>
    {{$user->email}}

    <form action="/users/{{$user->id}}" method="post" class="mt-6">
        @csrf
        @method('DELETE')
        <x-button>Delete</x-button>
    </form>

</x-app-layout>
