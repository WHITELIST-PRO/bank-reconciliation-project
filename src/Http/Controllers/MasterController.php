<?php

namespace WhitelistPRO\BankReconciliation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index() {
        /**
         * use 'WhitelistPRO\BankReconciliation::' namespace for call view file inside of bank package
         */
        return view('WhitelistPRO\BankReconciliation::welcome');
    }

    public function dashboard() {
        return view('WhitelistPRO\BankReconciliation::dashborad');
    }

}
