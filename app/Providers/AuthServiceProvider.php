<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        /* Nota para mi mismo
        He quitado esta funcion con la idea que todos los Roles puedan pasar al sistema */
        // Implicitamente le da a "Administrador" Todos los permisos
        /* Revisar mejor la documentacion de SPATIE sobre esto */
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        /*  Gate::before(function ($user, $ability) {
            return $user->hasRole('Administrador') ? true : null;
            //return $user->email == 'admin@gmail.com' ?? null;
        }); */
    }
}
