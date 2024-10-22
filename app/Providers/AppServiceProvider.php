<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private function getRoutesManifest() {
        // Check if data is already stored in the session or cache
        $routesManifestJson = session('routes_manifest', false); // ?? cache('routes_manifest', false);

        if (!$routesManifestJson) {
            $routesManifestJson = File::get(base_path('routes/routes.json'));

            // Store in the session or cache
            session(['routes_manifest' => $routesManifestJson]);
            // Or use cache, with a specified duration
            // cache(['routes_manifest' => $routesManifestJson], now()->addMinutes(15));
        }

        return json_decode($routesManifestJson, true);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('menu', $this->getRoutesManifest()['menu']);
        // View::composer('*', function ($view) {
        //     $routes = $this->getRoutesManifest();
        //     $sharedData = ['menu' => $routes['menu']];
        //     $view->with($sharedData);
        // });
    }
}
