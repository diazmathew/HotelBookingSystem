<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 bg-white border border-jade-800/30 font-medium text-xs text-jade-800 uppercase tracking-[0.15em] hover:bg-ivory-200 focus:outline-none focus:ring-2 focus:ring-gold-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
