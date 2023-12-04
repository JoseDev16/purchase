<?php

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
Route::post('purchase-order-assign-client',[\App\Http\Controllers\PurchaseOrderController::class,'assignClientToPurchaseOrder'])->name('purchase-orders.assign-client');
Route::post('purchase-order/add-product',[\App\Http\Controllers\PurchaseOrderController::class,'addProduct'])->name('purchase-orders.add-product');
Route::post('purchase-order/close',[\App\Http\Controllers\PurchaseOrderController::class,'close'])->name('purchase-orders.close');

Route::get('purchase-order',[\App\Http\Controllers\PurchaseOrderController::class,'index'])->name('purchase-orders.index');
Route::get('purchase-order-create',[\App\Http\Controllers\PurchaseOrderController::class,'create'])->name('purchase-order.create');
Route::get('purchase-order/{purchaseOrder}',[\App\Http\Controllers\PurchaseOrderController::class,'getDetails'])->name('purchase-order.get-details');
