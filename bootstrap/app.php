<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Http\Middleware\CheckAbilities;
use Laravel\Sanctum\Http\Middleware\CheckForAnyAbility;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'abilities' => CheckAbilities::class,
            'ability' => CheckForAnyAbility::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ValidationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => __('exception.validation_errors'),
                    'errors' => $e->getMessage(),
                    'code' => 400,
                ], 400);
            }
        });
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => __('exception.record_not_found'),
                    'errors' => config('app.debug') ? $e->getMessage() : '',
                    'code' => 404,
                ], 404);
            }
        });
        $exceptions->render(function (\Exception $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => __('exception.error_has_occurred'),
                    'errors' => config('app.debug') ? $e->getMessage() : '',
                    'code' => $e->getCode(),
                ], 500);
            }
        });
    })->create();
