<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>
    <form action="" class="w-96 mt-5" wire:submit.prevent='apply'>
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Currículum/Hoja de Vida (PDF)')" />
            <x-text-input 
                id="cv" 
                class="block mt-1 w-full" 
                type="file" 
                wire:model="cv"
                accept=".pdf"
            />
            {{-- <x-input id="cv" type="file" accept=".pdf" class="block mt-1 w-full" /> --}}
        </div>
        @error('cv')
            <livewire:show-alert :message="$message" />
        @enderror
        <x-primary-button class="my-5 w-full justify-center">
            {{ __('Postularme') }}
        </x-primary-button>
    </form>
</div>
