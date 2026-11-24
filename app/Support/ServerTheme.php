<?php

namespace App\Support;

class ServerTheme
{
    public static function current(): array
    {
        $host = gethostname() ?: 'servidor';

        $themes = [
            'page1' => [
                'name' => 'verde',
                'bar' => 'bg-green-500',
                'tint' => 'bg-green-500/10',
                'dot' => 'bg-green-500',
                'pill' => 'border-green-400 bg-green-100 text-green-900 dark:border-green-600 dark:bg-green-950/80 dark:text-green-200',
                'card' => 'border-green-500/40 bg-linear-to-br from-green-500/25 to-green-500/5',
                'chip' => 'bg-green-500 text-white',
                'text' => 'text-green-600 dark:text-green-300',
            ],
            'page2' => [
                'name' => 'amarillo',
                'bar' => 'bg-yellow-400',
                'tint' => 'bg-yellow-400/10',
                'dot' => 'bg-yellow-400',
                'pill' => 'border-yellow-400 bg-yellow-100 text-yellow-900 dark:border-yellow-500 dark:bg-yellow-950/80 dark:text-yellow-200',
                'card' => 'border-yellow-400/40 bg-linear-to-br from-yellow-400/25 to-yellow-400/5',
                'chip' => 'bg-yellow-400 text-zinc-900',
                'text' => 'text-yellow-600 dark:text-yellow-300',
            ],
        ];

        foreach ($themes as $key => $theme) {
            if (str_contains($host, $key)) {
                return $theme + ['host' => $host];
            }
        }

        return [
            'name' => 'gris',
            'bar' => 'bg-zinc-400',
            'tint' => 'bg-zinc-400/10',
            'dot' => 'bg-zinc-400',
            'pill' => 'border-zinc-300 bg-zinc-100 text-zinc-800 dark:border-zinc-600 dark:bg-zinc-900/80 dark:text-zinc-200',
            'card' => 'border-zinc-500/40 bg-linear-to-br from-zinc-500/25 to-zinc-500/5',
            'chip' => 'bg-zinc-500 text-white',
            'text' => 'text-zinc-600 dark:text-zinc-300',
            'host' => $host,
        ];
    }
}
