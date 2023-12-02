<div>
    <livewire:jobs-filter />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 mb-10">
                Nuestras vacantes de empleo disponibles
            </h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($jobs as $job)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-gray-600" href="{{ route('jobs.show', $job->id) }}">
                                {{ $job->title }}
                            </a>
                            <p class="text-base text-gray-600 mb-1">{{ $job->company }}</p>
                            <p class="text-xs font-bold text-gray-600 mb-1">{{ $job->category->category }}</p>
                            <p class="text-base text-gray-600 mb-1">{{ $job->rate->rate }}</p>

                            <p class="font-bold text-xs text-gray-600">
                                Último día para postularse
                                <span class="font-normal">{{ $job->last_date->format('d/m/Y') }}</span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a 
                                href="{{ route('jobs.show', $job->id) }}"
                                class="bg-slate-800 hover:bg-slate-600 py-2 px-4 rounded-lg text-white text-xs font-bold block text-center"
                            >
                                Ver vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">
                        No hay vacantes
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
