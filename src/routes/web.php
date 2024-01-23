<?php

use Illuminate\Support\Facades\Route;
use WhitelistPRO\BankReconciliation\Http\Controllers\MasterController;



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
 */

Route::group(["namespace"=> "WhitelistPRO\BankReconciliation\Http\Controllers"], function () {
    Route::get("/index", [MasterController::class,"index"]);
});
