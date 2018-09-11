<?php

namespace App\Providers;
use View;
use Auth;
use Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Attribute;
use App\Models\Order;
use App\Helper\Cart;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       View::share(
        [
            'cart' => new Cart(),   
            'list_cat' => Category::all(),
            'cats' => Category::where('parent',0)->orderBy('name','ASC')->get(),   
            'slide' => Slide::all(),
            'colors' =>Attribute::where('type','color')->get(),
            'sizes' =>Attribute::where('type','size')->get(),
        ]);

       //change password
       Validator::extend('OldPassword', function($attribute, $value, $parameters, $validator){
            return Hash::check($value,Auth::user()->password);
       });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
