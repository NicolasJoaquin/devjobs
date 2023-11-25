<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($jobs as $job)
            <div class="p-6 bg-white border-b border-gray-200 text-gray-900 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="{{ route('jobs.show', $job) }}" class="text-xl font-bold">
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
                    <a href="{{ route('applicants.index', $job) }}" class="bg-slate-800 hover:bg-slate-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                        {{ $job->applicants->count() }} 
                        @choice('Candidato|Candidatos', $job->applicants->count())
                    </a>
                    <a href="{{ route('jobs.edit', $job->id) }}" class="bg-blue-800 hover:bg-blue-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                        Editar
                    </a>
                    <button 
                        wire:click='$dispatch("showAlert", {id: {{ $job->id }}})'
                        class="bg-red-700 hover:bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-bold text-center"
                    >
                        Eliminar
                    </button>
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
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Llamando a la función desde Livewire
        Livewire.on('showAlert', (id) => {
            // alert('desde js ' + id.id);
            // console.log(id);
            Swal.fire({
                title: "¿Estás seguro de querer eliminar esta vacante de empleo?",
                text: "¡No podrás recuperarla!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    const job_id = id.id;
                    Livewire.dispatch('deleteJob', {job: job_id});
                    Swal.fire({
                    title: "¡Vacante eliminada!",
                    text: "Tu vacante de empleo fué eliminada con éxito.",
                    icon: "success"
                    });
                }
            });
        });
    </script>
@endpush