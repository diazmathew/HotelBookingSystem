@props(['type' => 'success', 'message'])

@php
$styles = [
    'success' => 'bg-jade-50 border-jade-600 text-jade-800',
    'error' => 'bg-red-50 border-red-700 text-red-800',
][$type] ?? 'bg-ivory-200 border-gold-500 text-jade-800';
@endphp

@if($message)
<div
    x-data="{ show: true }"
    x-show="show"
    x-init="setTimeout(() => show = false, 4000)"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    class="{{ $styles }} border-l-4 px-4 py-3 mb-5 flex items-center justify-between gap-4"
>
    <span>{{ $message }}</span>

    <button type="button" x-on:click="show = false" class="opacity-60 hover:opacity-100 transition">
        ✕
    </button>
</div>
@endif
