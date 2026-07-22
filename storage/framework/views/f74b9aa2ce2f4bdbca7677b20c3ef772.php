<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type' => 'success', 'message']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['type' => 'success', 'message']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$styles = [
    'success' => 'bg-jade-50 border-jade-600 text-jade-800',
    'error' => 'bg-red-50 border-red-700 text-red-800',
][$type] ?? 'bg-ivory-200 border-gold-500 text-jade-800';
?>

<?php if($message): ?>
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
    class="<?php echo e($styles); ?> border-l-4 px-4 py-3 mb-5 flex items-center justify-between gap-4"
>
    <span><?php echo e($message); ?></span>

    <button type="button" x-on:click="show = false" class="opacity-60 hover:opacity-100 transition">
        ✕
    </button>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\1\1\HotelBookingSystem\resources\views/components/flash.blade.php ENDPATH**/ ?>