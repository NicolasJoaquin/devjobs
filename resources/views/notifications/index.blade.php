<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-center mb-10">Mis notificaciones</h1>
                    <div class="divide-y-2 divide-gray-200">                  
                        @forelse ($notifications as $notification)
                            <div class="p-5 md:flex md:justify-between md:items-center">
                                <div>
                                    <p>
                                        Tenés un nuevo candidato en: <span class="font-bold">{{ $notification->data['job_title'] }}</span>
                                    </p>
                                    <p>
                                        <span class="font-bold">{{ $notification->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <div class="mt-5 lg:mt-0 md:mt-0">
                                    <a href="{{ route('applicants.index', $notification->data['job_id']) }}" class="bg-slate-800 hover:bg-slate-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                                        Ver candidatos
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600">
                                No hay nuevas notificaciones
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
