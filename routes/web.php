<?php
use App\Http\Controllers\admin\AddMenuController;
use App\Http\Controllers\Admin\common_fntion;
use App\Http\Controllers\admin\EcommerceController;
use App\Http\Controllers\admin\ProductImageController;
use App\Http\Controllers\Admin\ModulesController;
use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::get('/login_with_otp', 'login_with_otp')->name('login_with_otp');
    Route::get('/create', 'create')->name('create'); // Define the POST route for create
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::middleware(['auth'])->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::post('/logout', 'logout')->name('logout');
    });
});

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function() {

    Route::resource('modules', ModulesController::class);
    Route::post('get_menu',  'App\Http\Controllers\Admin\common_fntion@get_menu1');
    Route::resource('add_menu',AddMenuController::class);
    Route::resource('product_image',ProductImageController::class);

    
});
Route::resource('ecommerce_dashboard',EcommerceController::class);

    });


