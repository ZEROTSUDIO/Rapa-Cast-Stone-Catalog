<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Vite;
use App\Support\Vite as ViteSupport;

class AppServiceProvider extends ServiceProvider
{
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
        \Illuminate\Support\Facades\View::composer('components.front.navbar', function ($view) {
            $view->with('categories', \App\Models\Category::all());
        });

        Blade::directive('vite', function ($expression) {
            // Di production, JANGAN pernah pakai dev server
            if (!app()->isLocal() || !ViteSupport::useDevServer()) {
                return "<?php echo app(\Illuminate\Foundation\Vite::class)($expression)->useManifest('build/manifest.json'); ?>";
            }

            // Di local, tetap perilaku default (dev server)
            return "<?php echo app(\Illuminate\Foundation\Vite::class)($expression); ?>";
        });
    }
}
