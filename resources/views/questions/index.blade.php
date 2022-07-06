<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List All Questions') }}
        </h2>

        <x-button
            tag="a"
            :href="route('questions.create')"
        >
            Add Question
        </x-button>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table w-full">
                        <thead class="text-center">
                            <th>
                                Name
                            </th>
                            <th>
                                Create At
                            </th>
                            <th>
                                View
                            </th>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($questions as $question)
                            <tr>
                                <td class="p-4">
                                    {{ $question->question }}
                                </td>

                                <td class="p-4">
                                    {{ $question->created_at }}
                                </td>
                                <td class="p-4">
                                    <a href="{{ route('questions.edit', $question) }}">
                                        View
                                    </a>
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
