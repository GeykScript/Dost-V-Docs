<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DiscordWebhookService
{
    public static function sendError(\Throwable $e): void
    {
        $webhook = config('services.discord.webhook');

        if (!$webhook) return;

        Http::post($webhook, [
            'embeds' => [
                [
                    'title'  => '🚨 DOCS Error Alert!',
                    'color'  => 16711680,
                    'fields' => [
                        ['name' => 'Message', 'value' => $e->getMessage()],
                        ['name' => 'File',    'value' => $e->getFile() . ':' . $e->getLine()],
                        ['name' => 'URL',     'value' => request()->fullUrl() ?? 'N/A'],
                    ],
                    'timestamp' => now()->toIso8601String(),
                ]
            ]
        ]);
    }
}