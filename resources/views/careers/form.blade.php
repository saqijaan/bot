<form method="POST" action="{{ $career->exists ? route('careers.update', $career) : route('careers.store') }}">
    @csrf

    @if ($career->exists)
        @method('PUT')
    @endif

    <!-- Email Address -->
    <div>
        <x-label for="career_name" :value="__('Career Name')" />
        <x-input id="career_name" class="block mt-1 w-full" type="text" name="career_name" :value="old('career_name', $career->career_name)" required autofocus />
        @error('career_name')
            <div class="text-red-400">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <x-label for="education" :value="__('Education')" />
        <x-textarea id="education" class="block mt-1 w-full" name="education" required autofocus >{{ old('education', $career->education) }}</x-textarea>
        @error('education')
            <div class="text-red-400">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <x-label for="skills" :value="__('Skills')" />
        <x-textarea id="skills" class="block mt-1 w-full" name="skills" required autofocus >{{ old('skills',$career->skills) }}</x-textarea>
        @error('skills')
            <div class="text-red-400">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <x-label for="interests" :value="__('Interests')" />
        <x-textarea id="interests" class="block mt-1 w-full" name="interests" required autofocus >{{ old('interests',$career->interests) }}</x-textarea>
        @error('interests')
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
