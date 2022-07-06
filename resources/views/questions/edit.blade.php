<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('questions.form')
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-red-800">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-end">
                    <form action="{{ route('questions.destroy', $question) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button
                            typeClass="bg-red-800">
                            Delete
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
