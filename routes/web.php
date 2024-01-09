<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CanteenController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\SchoolFoodMenuController;

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
    return view('Login');
});

//MenuShow
Route::get('{school_slug}/FoodMenu', [SchoolFoodMenuController::class, 'showSchoolFoodMenu'])->name('show.food-menu');
Route::get('{school_name}/{canteen_name}/FoodMenu',[SchoolFoodMenuController::class, 'showCanteenData'])->name('show_food_menu');


Route::group(['middleware' => 'guest'], function(){
    Route::get('/register',[AuthController::class, 'register']) -> name('register');
    Route::post('/register',[AuthController::class, 'registerPost']) -> name('register');
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/login',[AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function(){

    //user and role
    Route::put('/users/{user}/update-role', [AuthController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    //user show
    Route::get('/users',[AuthController::class,'index'])->name('users.index')->middleware('can:ed_de');
    Route::delete('/users/{id}', [AuthController::class,'destroy'])->name('users.delete');
    Route::get('/users/create', [AuthController::class,'create'])->name('users.create');
    Route::post('/users', [AuthController::class,'store'])->name('users.store');

    //Dashboard&School
    Route::get('School',[SchoolController::class, 'index'])->name('schools.index');
    Route::get('School/Create',[SchoolController::class, 'create'])->name('schools.create');
    Route::post('School',[SchoolController::class, 'store'])->name('schools.store');
    Route::get('School/{school_id}/Edit',[SchoolController::class, 'edit'])->name('schools.edit');
    Route::put('School/{school_id}/Update', [SchoolController::class, 'update'])->name('schools.update');
    Route::delete('School/{school_id}/Delete', [SchoolController::class, 'destroy'])->name('schools.destroy');

    
    //Canteen
    Route::get('School/{school_id}/Canteen',[CanteenController::class, 'index'])->name('canteens.index');
    Route::get('School/{school_id}/Canteen/Create', [CanteenController::class,'create'])->name('canteens.create');
    Route::post('School/{school_id}/Canteen', [CanteenController::class,'store'])->name('canteens.store');
    Route::get('School/Canteen/{canteen_id}/Edit',[CanteenController::class, 'edit'])->name('canteens.edit');
    Route::put('School/Canteen/{canteen_id}/Update', [CanteenController::class, 'update'])->name('canteens.update');
    Route::delete('School/Canteen/{canteen_id}/Delete', [CanteenController::class, 'destroy'])->name('canteens.destroy');

    //Category
    Route::get('School/Canteen/{canteen_id}/Category',[CategoryController::class, 'index'])->name('category.index');
    Route::get('School/Canteen/{canteen_id}/Category/Create', [CategoryController::class,'create'])->name('category.create');
    Route::post('School/Canteen/{canteen_id}/Category', [CategoryController::class,'store'])->name('category.store');
    Route::get('School/Canteen/Category/{category_id}/Edit',[CategoryController::class, 'edit'])->name('category.edit');
    Route::put('School/Canteen/Category/{category_id}/Update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('School/Canteen/Category/{category_id}/Delete', [CategoryController::class, 'destroy'])->name('category.destroy');

    //FoodItem
    Route::get('School/Canteen/Category/{category_id}/FoodItem',[FoodItemController::class, 'index'])->name('fooditem.index');
    Route::get('School/Canteen/Category/{category_id}/FoodItem/Create', [FoodItemController::class,'create'])->name('fooditem.create');
    Route::post('School/Canteen/Category/{category_id}/FoodItem', [FoodItemController::class,'store'])->name('fooditem.store');
    Route::get('School/Canteen/Category/FoodItem/{fooditem_id}/Edit',[FoodItemController::class, 'edit'])->name('fooditem.edit');
    Route::put('School/Canteen/Category/FoodItem/{fooditem_id}/Update', [FoodItemController::class, 'update'])->name('fooditem.update');
    Route::delete('School/Canteen/Category//FoodItem/{fooditem_id}/Delete', [FoodItemController::class, 'destroy'])->name('fooditem.destroy');
 
});