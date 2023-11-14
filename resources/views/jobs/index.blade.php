<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="text-sm text-green-600 bg-green-100 border-l-4 border-green-600 p-2 my-3">
                    {{ session('message') }}
                </div>
            @endif
            <livewire:show-jobs />
        </div>
    </div>
</x-app-layout>
