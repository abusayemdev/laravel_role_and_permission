<?php

use Illuminate\Support\Facades\Route;

//admin cobtroller define here
use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;


//user cobtroller define here
use App\Http\Controllers\Frontend\UserController;



//Site routes
Route::get('/', function () {
    return view('welcome');
})->name('/');




require __DIR__.'/auth.php';

//user profile

Route::middleware('auth')->group(function(){

    //frontend routes
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

    //admin dashboard route
    Route::get('user-profile', [UserController::class, 'user_profile'])->name('user-profile');

});



//admin routes

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    
    Route::namespace('Auth')->middleware('guest:web')->group(function(){

        //admin login route
        Route::get('/login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AdminAuthenticatedSessionController::class, 'store'])->name('adminlogin');

    });

    Route::middleware('admin')->group(function(){

        //admin dashboard route
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

        //account route
        Route::get('account', [AdminController::class, 'account'])->name('account');
        Route::post('account.update/{id}', [AdminController::class, 'update'])->name('account.update');
 

        //settings routes
        Route::resource('settings', SettingController::class);
        Route::get('active-settings/{id}', [App\Http\Controllers\Admin\SettingController::class,'active_settings']);
        Route::get('inactive-settings/{id}', [App\Http\Controllers\Admin\SettingController::class,'inactive_settings']);
        
        //super admin routes
        Route::resource('super-admin', SuperAdminController::class);
        Route::get('make-super-admin/{id}', [App\Http\Controllers\Admin\SuperAdminController::class,'make_super_admin']);
        Route::get('make-admin/{id}', [App\Http\Controllers\Admin\SuperAdminController::class,'make_admin']);

        //roles & permission routes
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('admin-assign-role', 'AssignRoleController');
    });

    //admin logout route
    Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');
});