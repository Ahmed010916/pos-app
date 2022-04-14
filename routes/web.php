<?php

use App\Http\Controllers\settings\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Route::get('/', function () {
        //$user = User::find();
        if(Auth::user()->status == 0)
        {
            $no=0;
            Auth::logout();
            Session()->flash('acount_disabled', __('site.acount_disabled'));
            return redirect()->route('login')->with($no,'no');
        }
        return view('Home');
    })->middleware(['auth'])->name('home');

    Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);

    /* start settings  */

        /* start users  */
        Route::resource('users', UserController::class);
        /* end users  */


    /* End settings  */
});


