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
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HirePageController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\FeedBackController;


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
    Route::get('/blog/delete/multiple',[BlogController::class, 'deleteBlogMultiple']);
    Route::post('/blog/edit/submit',[BlogController::class, 'posteditBlog'])->name('posteditBlog');
    //slie
    Route::get('/slide',[SlideController::class, 'getSlide']); 
    Route::get('/slide/create',[SlideController::class, 'getAddSlide']); 
    Route::post('/slide/create',[SlideController::class, 'postAddSlide']); 
    Route::get('/slide/edit',[SlideController::class, 'editSlide'])->name('editSlide');
    Route::post('/slide/edit/submit',[SlideController::class, 'posteditSlide'])->name('posteditSlide');
    Route::get('/slide/delete',[SlideController::class, 'deleteSlide'])->name('deleteSlide');
    Route::get('/slide/search',[SlideController::class, 'searchSlide'])->name('searchSlide');
    //layout
    Route::get('/layout',[LayoutController::class, 'getLayout']); 
    Route::get('/layout/create',[LayoutController::class, 'getAddLayout']); 
    Route::post('/layout/create',[LayoutController::class, 'postAddLayout']); 
    Route::get('/layout/edit',[LayoutController::class, 'editLayout'])->name('editLayout');
    Route::post('/layout/edit/submit',[LayoutController::class, 'posteditLayout'])->name('posteditLayout');
    Route::get('/layout/delete',[LayoutController::class, 'deleteLayout'])->name('deleteLayout');
    Route::get('/layout/delete/multiple',[LayoutController::class, 'deleteLayoutMultiple']);
    //department(bộ phận)
    Route::get('/dept',[DepartmentController::class, 'getDept']); 
    Route::get('/dept/create',[DepartmentController::class, 'getAddDept']); 
    Route::get('/dept/delete',[DepartmentController::class, 'deleteDept'])->name('deleteDept'); 
    Route::get('/dept/delete/multiple',[DepartmentController::class, 'deleteDeptMultiple']);
    Route::get('/dept/edit',[DepartmentController::class, 'getEditDept'])->name('editDept');
    Route::post('/dept/create',[DepartmentController::class, 'postAddDept']);
    Route::post('/dept/edit/submit',[DepartmentController::class, 'postEditDept'])->name('posteditDept'); 
    //staff(nhân viên)
    Route::get('/staff',[StaffController::class, 'getStaff']); 
    Route::get('/staff/edit/{id}',[StaffController::class, 'editStaff']); 
    Route::get('/staff/delete',[StaffController::class, 'deleteStaff'])->name('deleteStaff'); 
    Route::get('/staff/delete/multiple',[StaffController::class, 'deleteStaffMultiple']);
    Route::post('/staff/edit/{id}',[StaffController::class, 'posteditStaff']);
    //user
    Route::get('/user',[UserController::class, 'getUser']); 
    Route::get('/user/edit/{id}',[UserController::class, 'getEditUser']);
    Route::post('/user/edit/{id}',[UserController::class, 'postEditUser']);
    Route::get('/user/create',[UserController::class, 'getAddStaff']); 
    Route::post('/user/create',[UserController::class, 'postAddStaff']); 
    Route::get('/user/delete',[UserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/user/delete/multiple',[UserController::class, 'deleteUserMultiple']);
    //khách hàng(customer)
    Route::get('/customer',[CustomerController::class, 'getCustomer']); 
    Route::get('/customer/create',[CustomerController::class, 'getAddCustomer']); 
    Route::get('/customer/edit/{id}',[CustomerController::class, 'editCustomer']); 
    Route::post('/customer/edit/{id}',[CustomerController::class, 'postditCustomer']); 
    Route::post('/customer/add',[CustomerController::class, 'postAddCustomer']); 
    Route::get('/customer/delete',[CustomerController::class, 'deleteCustomer'])->name('deleteCustomer');
    Route::get('/customer/delete/multiple',[BlogController::class, 'deleteCustomerMultiple']);
    //service
    Route::get('/service',[ServiceController::class, 'getService']); 
    Route::get('/service/create',[ServiceController::class, 'getAddService']); 
    Route::post('/service/create',[ServiceController::class, 'postAddService']); 
    Route::get('/service/edit/{id}',[ServiceController::class, 'editService']); 
    Route::post('/service/edit/{id}',[ServiceController::class, 'posteditService']); 
    Route::get('/service/delete',[ServiceController::class, 'deleteService'])->name('deleteService');
    Route::get('/service/delete/multiple',[ServiceController::class, 'deleteServiceMultiple']);
    //sản phẩm
    Route::get('/product',[ProductController::class, 'getProduct']); 
    Route::get('/product/create',[ProductController::class, 'addProduct']); 
    Route::post('/product/create',[ProductController::class, 'postaddProduct']); 
    Route::get('/product/edit/{id}',[ProductController::class, 'editProduct']); 
    Route::post('/product/edit/{id}',[ProductController::class, 'posteditProduct']); 
    Route::post('/product/delete/multiple',[ProductController::class, 'deleteProductMultiple']);
    //detailProduct
    Route::get('/detail',[DetailController::class, 'getDetail']);
    Route::get('/detail/create',[DetailController::class, 'getAddDetail']); 
    Route::post('/detail/add',[DetailController::class, 'postAddDetail']); 
    Route::get('/detail/edit/{id}',[DetailController::class, 'editDetail']); 
    Route::post('/detail/edit/{id}',[DetailController::class, 'postEditDetail']); 
    Route::get('/detail/delete',[DetailController::class, 'deleteDetail'])->name('deleteDetail'); 
    Route::get('/detail/delete/multiple',[DetailController::class, 'deleteDetailMultiple']);

    //liên hệ
    Route::get('/hire_page',[HirePageController::class, 'getHirePage']);
    Route::get('/hirepage/delete/multiple',[DetailController::class, 'deleteHirepageMultiple']);
    //cộng sự
    Route::get('/candidate',[CandidateController::class, 'getCandidate']);
    //phản hồi
    Route::get('/feed_back',[FeedBackController::class, 'getFeedback']);
    Route::get('/feedback/delete/multiple',[DetailController::class, 'deleteFeedbackMultiple']);

    // feed_back

 
});