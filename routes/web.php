<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StaffController;
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

Route::get('/',[FrontendController::class, 'index']);
//login
Route::get('/login',[AuthController::class, 'getLogin'])->name('login');
Route::post('/login',[AuthController::class, 'authenticate']);
Route::get('/logout',[AuthController::class, 'logoutAuth']);
//admin
Route::group(['prefix' => 'admin', 'middleware'=>'authLogin'], function () {
    Route::get('/',[AdminController::class, 'getIndex'])->name('getIndex'); 
    //blog
    Route::get('/blog',[BlogController::class, 'getBlog']); 
    Route::get('/blog/create',[BlogController::class, 'getAddBlog']); 
    Route::post('/blog/create',[BlogController::class, 'postAddBlog']); 
    Route::get('/blog/status',[BlogController::class, 'statusBlog'])->name('statusBlog');
    Route::get('/blog/edit',[BlogController::class, 'editBlog'])->name('editBlog');
    Route::get('/blog/delete',[BlogController::class, 'deleteBlog'])->name('deleteBlog');
    Route::post('/blog/edit/submit',[BlogController::class, 'posteditBlog'])->name('posteditBlog');
    //slie
    Route::get('/slide',[SlideController::class, 'getSlide']); 
    Route::get('/slide/create',[SlideController::class, 'getAddSlide']); 
    Route::post('/slide/create',[SlideController::class, 'postAddSlide']); 
    Route::get('/slide/edit',[SlideController::class, 'editSlide'])->name('editSlide');
    Route::post('/slide/edit/submit',[SlideController::class, 'posteditSlide'])->name('posteditSlide');
    Route::get('/slide/delete',[SlideController::class, 'deleteSlide'])->name('deleteSlide');
    //layout
    Route::get('/layout',[LayoutController::class, 'getLayout']); 
    Route::get('/layout/create',[LayoutController::class, 'getAddLayout']); 
    Route::post('/layout/create',[LayoutController::class, 'postAddLayout']); 
    Route::get('/layout/edit',[LayoutController::class, 'editLayout'])->name('editLayout');
    Route::post('/layout/edit/submit',[LayoutController::class, 'posteditLayout'])->name('posteditLayout');
    Route::get('/layout/delete',[LayoutController::class, 'deleteLayout'])->name('deleteLayout');
    //department(bộ phận)
    Route::get('/dept',[DepartmentController::class, 'getDept']); 
    Route::get('/dept/create',[DepartmentController::class, 'getAddDept']); 
    //staff(nhân viên)
    Route::get('/staff',[StaffController::class, 'getStaff']); 
    Route::get('/staff/create',[StaffController::class, 'getAddStaff']); 
    Route::post('/staff/create',[StaffController::class, 'postAddStaff']); 

});