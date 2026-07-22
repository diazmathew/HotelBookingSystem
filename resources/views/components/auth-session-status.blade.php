@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-jade-700']) }}>
        {{ $status }}
    </div>
@endif
