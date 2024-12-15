<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Le tableau de la cartographie des politiques / gardiens.
     *
     * @var array
     */
    protected $policies = [
        \App\Models\Ads::class => \App\Policies\AdsPolicy::class,
    ];
    

    /**
     * Enregistrez les services d'autorisation pour votre application.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Si tu veux ajouter des gates supplémentaires, tu peux les définir ici
        // Par exemple : Gate::define('view-admin', function ($user) {
        //     return $user->is_admin;
        // });
    }
}
