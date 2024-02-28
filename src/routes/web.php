<?php

use Illuminate\Support\Facades\Route;
use WhitelistPRO\BankReconciliation\Http\Controllers\BankDataController;
use WhitelistPRO\BankReconciliation\Http\Controllers\FileUploadController;
use WhitelistPRO\BankReconciliation\Http\Controllers\MasterController;
use WhitelistPRO\BankReconciliation\Http\Controllers\ReconciliationController;






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

/**
 * this web.php route file inside of bank package
 *
 * 'Samcom/Bank/Http/Controllers' this namespace use to call bank package controller
 */

Route::group(["namespace" => "WhitelistPRO\BankReconciliation\Http\Controllers"], function () {
    /**
     * testing route
     */
    Route::get("/index", [MasterController::class,"index"]);

    /**
     * route for geting dashbord content
     */
    Route::get("/dashboard", [MasterController::class,"dashboard"])->name('dashboard');

    /**
     * route for geting transaction file upload section
     *
     * return file upload section
     */
    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/list', [FileUploadController::class, 'index'])->name('file.list');
        Route::get('/upload', [FileUploadController::class, 'upload'])->name('file.upload');
        Route::post('/file/upload', [FileUploadController::class, 'store'])->name('file.transaction');
        Route::get('/view/{id}', [FileUploadController::class, 'view'])->name('file.view');
    });

    /**
     * route for geting bank data file upload section
     *
     * return file upload section
     */
    Route::group(['prefix' => 'bank-data'], function () {
        Route::get('/list', [BankDataController::class, 'index'])->name('bank.list');
        Route::get('/upload', [BankDataController::class, 'upload'])->name('bank.upload');
        Route::post('/file/upload', [BankDataController::class, 'store'])->name('file.bank');
        Route::get('/view/{id}', [BankDataController::class, 'view'])->name('bank.file.view');
    });

    /**
     * route for geting reconciliation data from teansaction table and bank data table
     *
     * return compare table for compare transaction data and bank data
     */
    Route::group(['prefix' => 'reconciliation'], function() {
        Route::any('/list', [ReconciliationController::class, 'index'])->name('reconciliation.list');
        Route::get('/transaction/data/{id}', [ReconciliationController::class, 'transaction_data']);
        Route::post('/update', [ReconciliationController::class, 'update'])->name('transaction.update');
        Route::post('/store/configration', [ReconciliationController::class, 'storeConfigration'])->name('configration.store');
    });
    Route::delete('/remove/configration/{id}', [ReconciliationController::class, 'removeConfigration'])->name('configration.remove');

    Route::get('/color/combination', [ReconciliationController::class, 'colorCombination_data']);
    Route::post('/store/color/combination', [ReconciliationController::class, 'storeColorCombination'])->name('combination.store');

});
