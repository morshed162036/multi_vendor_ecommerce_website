<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('/admin')->group(function(){
    // Admin Login Route
    Route::match(['get','post'],'login',[AdminController::class,'login'])->name('admin.login');

    Route::group(['middleware'=>['admin']],function(){
        // Admin Logout Route
        Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');

        // Admin Dashboard Route 
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
        
        //Vendor setting route
        Route::match(['get','post'],'update-vendor-details/{slug}',[AdminController::class,'updateVendorDetails'])->name('admin.update-vendor-details');


        // SuperAdmin & Admin

            // setting Routes
            Route::match(['get','post'],'update-admin-password',[AdminController::class,'updatePassword'])->name('admin.update-password');
            Route::post('check-current-password',[AdminController::class,'checkCurrentPassword'])->name('admin.check-current-password');
            Route::match(['get','post'],'update-admin-details',[AdminController::class,'updateDetails'])->name('admin.update-details');

            // Admin Management route
            Route::get('admins/{type?}',[AdminController::class,'adminManagement']);

            // Update Admin Status 
            Route::post('update-admin-status',[AdminController::class,'updateAdminStatus']);

            //Vendor view details
            Route::get('admins/view-vendor-details/{id}',[AdminController::class,'adminViewVendorDetails']);

            //Sections

            Route::get('sections',[SectionController::class,'sections'])->name('admin.view-section');
            Route::post('update-section-status',[SectionController::class,'updateSectionStatus']);

            //section delete
            Route::get('section-delete/{id}',[SectionController::class,'deleteSection'])->name('deleteSection');

            //section Add & Update
            Route::match(['get', 'post'], 'section-add-edit/{id?}',[SectionController::class,'add_edit_section']);


            // Categories

            Route::get('categories',[CategoryController::class,'categories'])->name('admin.view-categories');
            Route::post('update-category-status',[CategoryController::class,'updateCategoryStatus']);

            //categorie delete
            Route::get('category-delete/{id}',[CategoryController::class,'deleteCategory'])->name('deleteCategory');

            //categorie Add & Update
            Route::match(['get', 'post'], 'category-add-edit/{id?}',[CategoryController::class,'add_edit_category']);

        
    });
    
});

