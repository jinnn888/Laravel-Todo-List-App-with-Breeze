<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <form action="{{ route('todos.update', $todo->id) }}" method="POST"class="flex flex-col space-y-4">
                        @csrf
                        @method("PUT")
                        {{-- Namef --}}
                        <x-text-input name="name" type="text" placeholder="Todo name" :value="$todo->name"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        {{-- Description --}}
                        <textarea name="description" id="" placeholder="Todo description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $todo->description }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />

                        {{-- Status --}}

                        @php
                            $status = ['pending', 'in-progress', 'completed', 'on-hold', 'canceled'];
                        @endphp

                        <select name="status"  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="" disabled selected>Update status</option>
                            @foreach ($status as $status)
                                <option value="{{ $status }}">{{ ucfirst(str_replace('-', ' ', $status)) }}</option>
                            @endforeach
                        </select>

                        <x-primary-button type="submit" class="w-fit">save changes</x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
