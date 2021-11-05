<?php

namespace App\Providers;

use App\Models\Pricing;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('admin', function(User $user){
           
            return in_array($user->role_id, [1]);

        });
        Gate::define('adminManager', function(User $user){
           
            return in_array($user->role_id, [1,2]);

        });
        Gate::define('adminManagerTrainer', function(User $user){
           
            return in_array($user->role_id, [1,2,3]);

        });

        Gate::define('manager', function(User $user){
           
            return in_array($user->role_id, [2]);

        });
        
        Gate::define('trainer', function(User $user){
           
            return in_array($user->role_id, [3]);

        });

        Gate::define('pricing', function(User $user, Pricing $pricing){
            
            return $user->pricing_id == $pricing->id ;

        });
    }
}
