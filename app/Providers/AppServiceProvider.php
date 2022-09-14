<?php

namespace App\Providers;

use App\Models\Slider;
use App\Models\HeaderFooterModel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('admin.includes.header', function ($view) {
            $header_footer_info = HeaderFooterModel::where('status', 'Active')->first();
            $view->with('header_footer_info', $header_footer_info);
        });
        View()->composer('admin.includes.footer', function ($view) {
            $header_footer_info = HeaderFooterModel::where('status', 'Active')->first();
            $view->with('header_footer_info', $header_footer_info);
        });
    }
}
