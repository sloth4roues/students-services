<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Liste des middlewares globalement exécutés.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\HandleCors::class,
    ];

    /**
     * Groupes de middlewares appliqués par défaut.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \App\Http\Middleware\StartSession::class,
            \App\Http\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],
        'api' => [
            \App\Http\Middleware\ThrottleRequests::class,
            \App\Http\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Middleware spécifiques aux routes.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'cookieMiddleware' => \App\Http\Middleware\CookieMiddleware::class, // Ajoute ton Middleware ici
    ];
}
