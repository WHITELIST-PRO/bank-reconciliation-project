<?php

namespace WhitelistPRO\BankReconciliation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use WhitelistPRO\BankReconciliation\BankData;
use WhitelistPRO\BankReconciliation\Transaction;

class ReconciliationController extends Controller
{
    public function index() {
        $bank = BankData::get();
        $transaction = Transaction::get();
        return view('WhitelistPRO\BankReconciliation::reconciliation.index', compact());
    }
}
