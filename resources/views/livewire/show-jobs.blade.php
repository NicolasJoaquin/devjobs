<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($jobs as $job)
            <div class="p-6 bg-white border-b border-gray-200 text-gray-900 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="#" class="text-xl font-bold">
                        {{ $job->title }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">
                        {{ $job->company }}
                    </p>
                    <p class="text-sm text-gray-500">
                        Último día para postularse: {{ $job->last_date->format('d/m/Y') }}
                    </p>
                </div>
                <div class="flex gap-3 mt-5 md:mt-0 flex-col items-stretch md:flex-row">
                    <a href="#" class="bg-slate-800 hover:bg-slate-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                        Candidatos
                    </a>
                    <a href="{{ route('jobs.edit', $job->id) }}" class="bg-blue-800 hover:bg-blue-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                        Editar
                    </a>
                    <a href="#" class="bg-red-700 hover:bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                        Eliminar
                    </a>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">
                No hay vacantes
            </p>
        @endforelse
    </div>
    <div class="mt-10">
        {{ $jobs->links() }}
    </div>
</div>