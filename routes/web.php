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

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();
// Пользователи начало

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/order',[App\Http\Controllers\HomeController::class, 'order_page'])->name('order')->middleware('auth');

Route::post('/home/update',[\App\Http\Controllers\HomeController::class, 'update' ])->middleware('auth');

// Пользователи конец

//фукцианал мастера начало



//фукцианал мастера конец

//Фукционал менеджера начало


Route::get('/orderEditForm/{id}',[\App\Http\Controllers\OrderController::class,'OpenEditForm'])->middleware('auth')->name('OpenEditOrderForm');
Route::post('/requests/store', [\App\Http\Controllers\OrderController::class, 'store'])->name('requests.store')->middleware('auth');
//Фукционал менеджера конец

// Фукцианал админа начало

//админка
Route::get('/admin',[\App\Http\Controllers\AdminController::class,'admin_page'])->name('admin_page')->middleware('auth');

//Добавление типа услуг
Route::post('/admin/addTypeOrder',[\App\Http\Controllers\OrderController::class,'add_type_order'])->name('admin.addTypeOrder')->middleware('auth');

//редактирование типа услуг
Route::post('/admin/editTypeOrder',[\App\Http\Controllers\OrderController::class,'type_order_edit'])->name('admin.editTypeOrder')->middleware('auth');

//Удаление типа услуг
Route::post('/admin/TypeOrder/{id}/del',[\App\Http\Controllers\OrderController::class,'type_order_del'])->name('admin.delTypeOrder')->middleware('auth');

// Фукцианал админа конец





