<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
    	// オーナー
    	Gate::define('owner', function ($user) {
    		return $user->role == 'オーナー';
    	});
    
    	// ユーザー
    	Gate::define('user', function ($user) {
    		return $user->role == 'ユーザー';
    	});
    }
}
