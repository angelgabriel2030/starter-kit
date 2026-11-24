@php($t = \App\Support\ServerTheme::current())
<div aria-hidden="true" class="pointer-events-none fixed inset-0 z-40 {{ $t['tint'] }}"></div>
<div aria-hidden="true" class="fixed inset-x-0 top-0 z-50 h-1.5 {{ $t['bar'] }}"></div>
<div class="fixed bottom-3 right-3 z-50 flex items-center gap-2 rounded-full border px-3 py-1 text-xs font-semibold shadow-lg {{ $t['pill'] }}">
    <span class="size-2 animate-pulse rounded-full {{ $t['dot'] }}"></span>
    Atendido por: <span>{{ $t['host'] }}</span>
</div>
