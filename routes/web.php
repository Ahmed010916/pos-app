<?php

<<<<<<< HEAD
use App\Http\Controllers\OffersController;
=======
>>>>>>> b185d782da2b94ebd0df9fa5a0eb39a1bb2911a3
use App\Http\Controllers\settings\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Route::get('/', function () {
<<<<<<< HEAD
        if(Auth::user()->status == 0){
            Auth::logout();
            Session()->flash('acount_disabled', __('site.acount_disabled'));
            return redirect()->route('login');
        }
       return view('Home');
    })->middleware(['auth'])->name('home');

    Auth::routes(['register' => true, 'reset' => false, 'confirm' => false]);
=======
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
>>>>>>> b185d782da2b94ebd0df9fa5a0eb39a1bb2911a3

    /* start settings  */

        /* start users  */
<<<<<<< HEAD
        Route::resource('users', UserController::class)->middleware('auth');
        /* end users  */

        /* start users  */
        Route::resource('offers', OffersController::class)->middleware('auth');
=======
        Route::resource('users', UserController::class);
>>>>>>> b185d782da2b94ebd0df9fa5a0eb39a1bb2911a3
        /* end users  */


    /* End settings  */
});


