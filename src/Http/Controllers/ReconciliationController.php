<?php

namespace WhitelistPRO\BankReconciliation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use WhitelistPRO\BankReconciliation\BankData;
use WhitelistPRO\BankReconciliation\ColorCombination;
use WhitelistPRO\BankReconciliation\Configration;
use WhitelistPRO\BankReconciliation\Transaction;

class ReconciliationController extends Controller
{
    public function index() {
        $post = new Transaction;
        $tableName = $post->getTable();
        $transactionColumns = Schema::getColumnListing($tableName);

        $bankPost = new BankData;
        $bankTableName = $bankPost->getTable();
        $bankColumns = Schema::getColumnListing($bankTableName);

        // Columns to exclude
        $excludeColumns = ['id', 'created_at', 'updated_at'];

        // Remove excluded columns
        $filteredTransactionColumns = array_diff($transactionColumns, $excludeColumns);
        $filteredBankColumns = array_diff($bankColumns, $excludeColumns);

        $bank = BankData::get();
        $transaction = Transaction::get();
        $configration = Configration::get();
        $combination = ColorCombination::get();

        return view('WhitelistPRO\BankReconciliation::reconciliation.index', compact('transaction', 'bank', 'configration', 'combination', 'filteredTransactionColumns', 'filteredBankColumns'));
    }

    public function transaction_data($id) {

        /**
         * find data with use of passing id
         *
         * @return `data` as json forment
         */
        $tran = Transaction::find($id);
        return response()->json($tran);
    }

    public function update(Request $request) {
        $tran = Transaction::find($request->id);
        /**
         * update fatch data
         */
        $tran->update($request->all());
        return redirect()->back()->with('transaction data updated successfully');
    }

    public function storeConfigration(Request $request) {

        $datas = $request->all();

        foreach($datas['key'] as $key => $data) {
            Configration::updateOrCreate(
                [
                    'key' => $data
                ],
                [
                    'value' => $datas['value'][$key]
                ]
            );
        }

        return response()->json(['message' => 'configration store successfully']);
    }

    public function removeConfigration($id) {

        Configration::find($id)->delete();
        return response()->json(['message' => 'configration remove successfully']);
    }

    public function storeColorCombination(Request $request) {

        ColorCombination::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'complete_matching_percentage' => $request->complete_matching_percentage,
                'partial_matching_percentage' => $request->partial_matching_percentage,
                'complete_matching' => $request->complete_matching,
                'complete_matching_select' => $request->complete_matching_select,
                'partial_matching' => $request->partial_matching,
                'partial_matching_select' => $request->partial_matching_select,
            ]);

        return response()->json(['message' => 'color combination updated successfully']);
    }
}
