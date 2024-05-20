<?php

use Illuminate\Support\Facades\Auth;
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
})->name('welcome');


Auth::routes();
// Пользователи начало

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/order',[App\Http\Controllers\HomeController::class, 'order_page'])->name('order')->middleware('auth');

Route::post('/home/update',[\App\Http\Controllers\HomeController::class, 'update' ])->middleware('auth');

// Пользователи конец

//фукцианал мастера начало

Route::post('/add-order-master',[\App\Http\Controllers\OrderController::class, 'assignOrderToMaster'])->name('assignOrderToMaster')->middleware('auth');

//фукцианал мастера конец

//Фукционал менеджера начало


Route::get('/admin/edit-type-order/{id}', [\App\Http\Controllers\OrderController::class, 'showEditForm'])->name('OpenEditOrderForm')->middleware('auth');

Route::post('/admin/edit-type-order', [\App\Http\Controllers\OrderController::class, 'editTypeOrder'])->name('admin.editTypeOrder')->middleware('auth');

Route::post('/order/add', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.add')->middleware('auth');
//Фукционал менеджера конец

// Фукцианал админа начало

//админка
Route::get('/admin',[\App\Http\Controllers\AdminController::class,'admin_page'])->name('admin_page')->middleware('auth');

//Добавление типа услуг
Route::post('/admin/addTypeOrder',[\App\Http\Controllers\OrderController::class,'add_type_order'])->name('admin.addTypeOrder')->middleware('auth');

Route::get('/admin/DeactivateAdm/{id}',[\App\Http\Controllers\AdminController::class,'DeactivateAdminRole'])->name('DeactivateAdminRole')->middleware('auth');
Route::get('/admin/ActivateAdm/{id}',[\App\Http\Controllers\AdminController::class,'ActivateAdminRole'])->name('ActivateAdminRole')->middleware('auth');

Route::get('/admin/DeactivateMas/{id}',[\App\Http\Controllers\AdminController::class,'DeactivateMasterRole'])->name('DeactivateMasterRole')->middleware('auth');
Route::get('/admin/ActivateMas/{id}',[\App\Http\Controllers\AdminController::class,'ActivateMasterRole'])->name('ActivateMasterRole')->middleware('auth');

Route::get('/admin/DeactivateMan/{id}',[\App\Http\Controllers\AdminController::class,'DeactivateManagerRole'])->name('DeactivateManagerRole')->middleware('auth');
Route::get('/admin/ActivateMan/{id}',[\App\Http\Controllers\AdminController::class,'ActivateManagerRole'])->name('ActivateManagerRole')->middleware('auth');

//редактирование типа услуг


//Удаление типа услуг
Route::post('/admin/TypeOrder/{id}/del',[\App\Http\Controllers\OrderController::class,'type_order_del'])->name('admin.delTypeOrder')->middleware('auth');

// Фукцианал админа конец





