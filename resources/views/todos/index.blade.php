<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <span class="text-md">
                        {{ __("Your current Todos") }}
                        <a class="text-sm text-blue-600 italic hover:underline" href="{{ route('todos.create') }}">Create a new one here.</a>
                    </span>
                    <table class="min-w-full">
                        <thead>
                            <tr class="border">
                                <th class="p-2 border-r">Task</th>
                                <th class="p-2 border-r">Description</th>
                                <th class="p-2 border-r">Status</th>
                                <th class="p-2 border-r">Declared at</th>
                                <th class="p-2 border-r">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                            <tr class="border">
                                <td class="py-2 px-4 border-r">{{ Str::limit($todo->name, 40) }}</td>
                                <td class="py-2 px-4 border-r">{{ Str::limit($todo->description, 40) }}</td>
                                <td class="py-2 px-4 border-r">{{ ucfirst(str_replace('-', ' ', $todo->status)) }}</td>
                                <td class="py-2 px-4 border-r">{{ $todo->created_at->diffForHumans() }}</td>
                                <td class="py-2 px-4 flex flex-row space-x-2">
                                    <a class="p-2 rounded shadow-sm text-white bg-green-600 text-sm" href="{{ route('todos.edit', $todo->id) }}">Edit</a>

                                    <form method="POST" action="{{ route('todos.destroy', $todo->id) }}">
                                        @csrf
                                        @method("DELETE")

                                        <button type="submit" class="p-2 rounded shadow-sm text-white bg-red-600 text-sm">Delete</button>

                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
