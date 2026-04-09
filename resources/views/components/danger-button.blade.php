<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center gap-2 rounded-2xl border border-red-400/30 bg-red-500/15 px-5 py-3 text-sm font-semibold text-red-100 transition duration-300 hover:-translate-y-0.5 hover:bg-red-500/25 focus:outline-none focus:ring-4 focus:ring-red-500/20']) }}>
    {{ $slot }}
</button>
