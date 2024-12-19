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
                   	<form action="{{ route('todos.store') }}" method="POST"class="flex flex-col space-y-4">
                   		@csrf
                   		{{-- Namef --}}
                   		<x-text-input name="name" type="text" placeholder="Todo name"/>
                   		<x-input-error :messages="$errors->get('name')" class="mt-2" />

                   		{{-- Description --}}
                   		<textarea name="description" id="" placeholder="Todo description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                   		<x-input-error :messages="$errors->get('description')" class="mt-2" />

                   		

                   		<x-primary-button type="submit" class="w-fit">Save</x-primary-button>

                   	</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
