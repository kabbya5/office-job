<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminBashboardController;
use App\Http\Controllers\Admin\AdminCountryController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AndarBahar\AndarBaharController;
use Illuminate\Support\Facades\Route;


Route::get('test', function(){
   dd(trx_code('User',12,'reffer_code'));
});


Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');  

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
    Route::get('/profile',function(){
        //
    })->name('profile');
});

Route::prefix('admin')->middleware(['auth','admin'])->name('admin.')->group(function(){
    Route::get('/dashboard', [AdminBashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('countries', AdminCountryController::class)->names('country');
    Route::resource('categories', CategoryController::class);
    Route::resource('providers', ProviderController::class);
});

// AndarBahar
Route::get('/andar/bahar/luanch',[AndarBaharController::class,'index'])->name('ander.bahar.luanch');  
Route::get('/andar/bahar/store/round', [AndarBaharController::class,'createRound']); 
Route::get('/andar/bahar/generate/card', [AndarBaharController::class,'generateCard']);
Route::get('/andar/bahar/deal/card', [AndarBaharController::class,'dealCards']);
Route::get('/andar/bahar/generate/result', [AndarBaharController::class, 'generateResult']);

Route::post('/andar/bahar/bet', [AndarBaharController::class, 'bet']);
Route::post('/andar/bahar/bet/cancel', [AndarBaharController::class, 'cancelBet']);