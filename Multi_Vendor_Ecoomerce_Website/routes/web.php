<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//admin route with admin group
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')
->group(function () 
{

    Route::match(['get','post'],'login','AdminController@login');


    // Route::get('/dashboard', 'dashboard');
    Route::group(['middleware' => ['admin']], function () {
        // Route::get('dashboard',[AdminController::class, 'dashboard']);
        Route::get('dashboard','AdminController@dashboard');
        Route::get('logout','AdminController@logout');
    
    });
});


//admin route without admin group

//Route::get('/admin/login', [AdminController::class, 'login']);

//Admin dashboard route
//Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);