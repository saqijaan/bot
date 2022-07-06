<form method="POST" action="{{ $question->exists ? route('questions.update', $question) : route('questions.store') }}">
    @csrf

    @if ($question->exists)
        @method('PUT')
    @endif

    <!-- Email Address -->
    <div>
        <x-label for="question" :value="__('Question')" />
        <x-input id="question" class="block mt-1 w-full" type="text" name="question" :value="old('question', $question->question)" required autofocus />
        @error('question')
            <div class="text-red-400">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-3">
            {{ __('Save') }}
        </x-button>
    </div>
</form>
