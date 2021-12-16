<?php

namespace App\Providers;

use App\Category;
use App\Page;
use App\Partner;
use Illuminate\Support\ServiceProvider;
use App\Settings;

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
        view()->share('categories', Category::whereCategoryId(Null)->take(5)->get());
        view()->share('allCategories', Category::whereCategoryId(Null)->get());
        view()->share('productCategories', Category::where('category_id' , '!=', 53)->where('category_id' , '!=' , 54)->get());
        view()->share('settings', Settings::findOrFail(1));
        view()->share('pages', Page::orderBy('position')->get());
        view()->share('partners', Partner::all());
    }
}
