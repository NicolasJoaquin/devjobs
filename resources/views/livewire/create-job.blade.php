<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='createJob'>
    <div>
        <x-input-label for="title" :value="__('Título de la vacante')" />
        <x-text-input 
            id="title" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="title" 
            :value="old('title')" 
            placeholder="PHP Developer (Remote)" 
        />
        {{-- <x-input-error :messages="$errors->get('title')" class="mt-2" /> --}}
        {{-- Mensaje de error personalizado --}}
        @error('title')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="rate" :value="__('Salario')" />
        <select 
            wire:model="rate" 
            id="rate"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option value="">-- Seleciona un rango --</option>
            @foreach ($rates as $rate)
                <option value="{{ $rate->id }}">{{ $rate->rate }}</option>            
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('rate')" class="mt-2" />
        {{-- <x-text-input id="rate" class="block mt-1 w-full" type="text" name="rate" :value="old('rate')" placeholder="$750.000" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" /> --}}
    </div>
    <div>
        <x-input-label for="category" :value="__('Categoría')" />
        <select 
            wire:model="category" 
            id="category"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option value="">-- Seleciona un rol --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>            
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input 
            id="company" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="company" 
            :value="old('company')" 
            placeholder="W&W Solutions" 
        />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="last_date" :value="__('Última fecha')" />
        <x-text-input 
            id="last_date" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="last_date" 
            :value="old('last_date')" 
        />
        <x-input-error :messages="$errors->get('last_date')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="description" :value="__('Descripción del puesto')" />
        <textarea 
            wire:model="description" 
            id="description" 
            cols="30" 
            rows="10" 
            placeholder="Descripción general del puesto, experiencia, beneficios, etc." 
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
        </textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="image" :value="__('Imágen')" />
        <x-text-input 
            id="image" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="image" 
            accept="image/*"
        />
        {{-- Two way data binding / Enlace de datos bidireccional --}}
        <div class="my-5 w-96">
            @if ($image)
                Imagen:
                <img src="{{ $image->temporaryUrl() }}" alt="Imagen subida" class="rounded-xl shadow-md">
            @endif
        </div>
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>
    <x-primary-button class="w-full justify-center">
        {{ __('Crear vacante') }}
    </x-primary-button>

</form>