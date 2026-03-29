<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Http;
use App\Services\DiscordWebhookService;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->report(function (\Throwable $e) {

            // Send Error Notification to Discord in local environment
            // Change this when in production 
            if (!app()->environment('local')) {
                return;
            }

            // Filter noise
            // Ignore 404 errors
            if ($e instanceof NotFoundHttpException) {
                return;
            }
            // Ignore validation errors
            if ($e instanceof ValidationException) {
                return;
            }
            // Ignore specific messages (optional fine-tuning)
            if (str_contains($e->getMessage(), 'Too Many Attempts')) {
                return;
            }

            //  Send to Discord
            DiscordWebhookService::sendError($e);
        });
    })->create();



//USE THIS IF NO NOISE FILTERING IS NEEDED, JUST SEND ALL ERRORS TO DISCORD

//     ->withExceptions(function (Exceptions $exceptions) {
//     $exceptions->report(function (\Throwable $e) {
//         // Send Error Notification to Discord in local environment
//         // Change this when in production 
//         if (app()->environment('local')) {
//             DiscordWebhookService::sendError($e);
//         }
//     });
// })->create();

