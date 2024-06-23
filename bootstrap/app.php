<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'super_admin' => \App\Http\Middleware\SuperAdmin::class,
            'admin' => \App\Http\Middleware\Admin::class,
            'pengajar' => \App\Http\Middleware\Pengajar::class,
            'siswa' => \App\Http\Middleware\Siswa::class,
            'pendaftar' => \App\Http\Middleware\Pendaftar::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
