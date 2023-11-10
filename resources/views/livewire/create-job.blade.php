<form action="" class="md:w-1/2 space-y-5">
    <div>
        <x-input-label for="title" :value="__('Título de la vacante')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autocomplete="username" placeholder="PHP Developer (Remote)" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="rate" :value="__('Salario')" />
        <select 
            name="role" 
            id="role"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option value="">-- Seleciona un rol --</option>
            <option value="1">Developer - Obtener empleo</option>
            <option value="2">Recruiter - Publicar empleos</option>
        </select>

        {{-- <x-text-input id="rate" class="block mt-1 w-full" type="text" name="rate" :value="old('rate')" placeholder="$750.000" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" /> --}}
    </div>
    <div>
        <x-input-label for="category" :value="__('Categoría')" />
        <select 
            name="category" 
            id="category"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option value="">-- Seleciona un rol --</option>
            <option value="1">Developer - Obtener empleo</option>
            <option value="2">Recruiter - Publicar empleos</option>
        </select>
    </div>
    <div>
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" placeholder="W&W Solutions" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="last_date" :value="__('Última fecha')" />
        <x-text-input id="last_date" class="block mt-1 w-full" type="date" name="last_date" :value="old('last_date')" />
        <x-input-error :messages="$errors->get('last_date')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="description" :value="__('Descripción del puesto')" />
        <textarea name="description" id="description" cols="30" rows="10" placeholder="Descripción general del puesto, experiencia, beneficios, etc." class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="image" :value="__('Imágen')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>
    <x-primary-button class="w-full justify-center">
        {{ __('Crear vacante') }}
    </x-primary-button>

</form>