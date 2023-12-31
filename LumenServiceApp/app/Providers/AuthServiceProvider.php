<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        /**
         * Register policy
         */
        
        // Gate Show All Post
        Gate::define('read-post', function ($user) {
            return $user->role === 'editor'|| $user->role === 'admin';
        });

        // Gate Create Post
        Gate::define('create-post', function ($user) {
            return $user->role === 'editor'|| $user->role === 'admin';
        });

        // Gate Show Post By Id
        Gate::define('show-post', function ($user, $post) {
            if ($user->role === 'admin') {
                return true;
            } else if ($user->role === 'editor') {
                return $user->id === $post->user_id;
            } else {
                return false;
            }
        });
        
        // Gate Update Post By Id
        Gate::define('update-post', function ($user, $post) {
            if ($user->role === 'admin') {
                return true;
            } else if ($user->role === 'editor') {
                return $user->id === $post->user_id;
            } else {
                return false;
            }
        });

        // Gate Delete Post By Id
        Gate::define('delete-post', function ($user, $post) {
            if ($user->role === 'admin') {
                return true;
            } else if ($user->role === 'editor') {
                return $user->id === $post->user_id;
            } else {
                return false;
            }
        });
        /** Register policy Ends */

        // authenticate user by token start
        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->input('api_token')) {
                return User::where('api_token', $request->input('api_token'))->first();
            }
        });
        // authenticate user by token end
    }
}
