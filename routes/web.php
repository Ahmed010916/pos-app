<?php

use App\Http\Controllers\OffersController;
use App\Http\Controllers\settings\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Route::get('/', function () {
        if(Auth::user()->status == 0){
            Auth::logout();
            Session()->flash('acount_disabled', __('site.acount_disabled'));
            return redirect()->route('login');
        }
       return view('Home');
    })->middleware(['auth'])->name('home');

    Auth::routes(['register' => true, 'reset' => false, 'confirm' => false]);

    /* start settings  */

        /* start users  */
        Route::resource('users', UserController::class)->middleware('auth');
        /* end users  */

        /* start users  */
        Route::resource('offers', OffersController::class)->middleware('auth');
        /* end users  */


    /* End settings  */
});


