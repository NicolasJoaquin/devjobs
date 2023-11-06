@php
    $classes = "text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500";
@endphp
{{-- <a class="" href="{{ route('password.request') }}"> --}}
<a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
</a>