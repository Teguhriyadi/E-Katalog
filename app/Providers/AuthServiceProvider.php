<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        Gate::define("admin", function ($user) {
            if (empty($user->role)) {
                return redirect("/logout");
            } else {
                return $user->role == "admin";
            }
        });

        Gate::define("editor", function ($user) {
            if (empty($user->role)) {
                return redirect("/logout");
            } else {
                return $user->role == "editor";
            }
        });

        Gate::define("penulis", function ($user) {
            if (empty($user->role)) {
                return redirect("/logout");
            } else {
                return $user->role == "penulis";
            }
        });

        Gate::define("customer", function ($user) {
            if (empty($user->role)) {
                return redirect("/logout");
            } else {
                return $user->role == "customer";
            }
        });
    }
}
