@php
    $t = \App\Support\ServerTheme::current();
    $user = auth()->user();
    $twoFactor = $user->hasEnabledTwoFactorAuthentication();
@endphp
<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4">
        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">

            {{-- Servidor actual --}}
            <div class="relative overflow-hidden rounded-2xl border p-6 shadow-sm md:col-span-2 {{ $t['card'] }}">
                <div class="flex items-center justify-between gap-3">
                    <span class="text-sm font-medium text-zinc-600 dark:text-zinc-300">Estás siendo atendido por</span>
                    <span class="rounded-full px-3 py-1 text-xs font-bold uppercase tracking-wide {{ $t['chip'] }}">{{ $t['name'] }}</span>
                </div>
                <div class="mt-3 flex items-center gap-3">
                    <span class="size-3 animate-pulse rounded-full {{ $t['dot'] }}"></span>
                    <span class="text-5xl font-black tracking-tight {{ $t['text'] }}">{{ $t['host'] }}</span>
                </div>
                <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-300">
                    Recarga la página: el balanceador (least_conn) puede enviarte al otro servidor y los colores cambiarán.
                </p>
            </div>

            {{-- Cuenta --}}
            <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                <div class="text-sm font-medium text-zinc-500 dark:text-zinc-400">👤 Tu cuenta</div>
                <div class="mt-4 flex items-center gap-3">
                    <div class="flex size-12 items-center justify-center rounded-full text-lg font-bold {{ $t['chip'] }}">{{ $user->initials() }}</div>
                    <div class="min-w-0">
                        <div class="truncate font-semibold text-zinc-900 dark:text-white">{{ $user->name }}</div>
                        <div class="truncate text-sm text-zinc-500 dark:text-zinc-400">{{ $user->email }}</div>
                    </div>
                </div>
            </div>

            {{-- Seguridad 2FA --}}
            <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                <div class="text-sm font-medium text-zinc-500 dark:text-zinc-400">🔐 Verificación en dos pasos</div>
                <div class="mt-4 flex items-center justify-between gap-3">
                    @if ($twoFactor)
                        <span class="rounded-full bg-green-500/15 px-3 py-1 text-sm font-semibold text-green-600 dark:text-green-300">Activada</span>
                    @else
                        <span class="rounded-full bg-amber-500/15 px-3 py-1 text-sm font-semibold text-amber-600 dark:text-amber-300">Sin activar</span>
                    @endif
                    <a href="{{ route('security.edit') }}" wire:navigate class="text-sm font-medium underline underline-offset-4 {{ $t['text'] }}">Configurar</a>
                </div>
                <p class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">Código OTP desde tu app de autenticación.</p>
            </div>

            {{-- Hora del servidor --}}
            <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                <div class="text-sm font-medium text-zinc-500 dark:text-zinc-400">🕒 Hora del servidor</div>
                <div class="mt-4 text-3xl font-bold tabular-nums text-zinc-900 dark:text-white">{{ now()->timezone('America/Mexico_City')->format('H:i:s') }}</div>
                <div class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">{{ now()->timezone('America/Mexico_City')->format('d/m/Y') }} · Ciudad de México</div>
            </div>

            {{-- Balanceo --}}
            <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                <div class="text-sm font-medium text-zinc-500 dark:text-zinc-400">⚖️ Balanceo de carga</div>
                <ul class="mt-4 space-y-2 text-sm">
                    <li class="flex items-center gap-2 text-zinc-700 dark:text-zinc-200"><span class="size-3 rounded-full bg-green-500"></span> page1 → verde</li>
                    <li class="flex items-center gap-2 text-zinc-700 dark:text-zinc-200"><span class="size-3 rounded-full bg-yellow-400"></span> page2 → amarillo</li>
                </ul>
            </div>

            {{-- Conexión segura --}}
            <div class="md:col-span-2 xl:col-span-3 rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                <div class="text-sm font-medium text-zinc-500 dark:text-zinc-400">🌐 Conexión cifrada</div>
                <div class="mt-4 flex flex-wrap items-center gap-2 text-xs font-semibold">
                    <span class="rounded-md bg-zinc-100 px-2 py-1 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-200">Cloudflare</span>
                    <span class="text-zinc-400">→</span>
                    <span class="rounded-md bg-zinc-100 px-2 py-1 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-200">Balanceador</span>
                    <span class="text-zinc-400">→</span>
                    <span class="rounded-md px-2 py-1 {{ $t['chip'] }}">{{ $t['host'] }}</span>
                </div>
                <p class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">HTTPS en todo el camino · sesión compartida entre servidores.</p>
            </div>

        </div>
    </div>
</x-layouts::app>
