<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $job->title }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-50 rounded p-4 my-10">
            <p class="font-bold text-sm text-gray-800 my-2">
                Empresa: 
                <span class="font-normal">{{ $job->company }}</span>
            </p>
            <p class="font-bold text-sm text-gray-800 my-2">
                Último día para postularse: 
                <span class="font-normal">{{ $job->last_date->toFormattedDateString() }}</span>
            </p>
            <p class="font-bold text-sm text-gray-800 my-2">
                Categoría: 
                <span class="font-normal">{{ $job->category->category }}</span>
            </p>
            <p class="font-bold text-sm text-gray-800 my-2">
                Salario: 
                <span class="font-normal">{{ $job->rate->rate }}</span>
            </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/jobs/' . $job->image) }}" alt="{{ 'Imagen de la vacante ' . $job->title }}" class="rounded-lg shadow-sm">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">
                Descripción del puesto
            </h2>
            <p class="">
                {{ $job->description }}
            </p>
        </div>
    </div>
    @guest        
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center rounded-lg">
            <p>
                ¿Deseas aplicar a esta vacante?
                <a href="{{ route('register') }}" class="font-bold text-indigo-600">Obten una cuenta y aplica a esta vacante</a>
            </p>
        </div>
    @endguest
    @cannot('create', App\Models\Job::class)
        <livewire:apply-job />
    @endcannot
</div>
