<?php

namespace WhitelistPRO\BankReconciliation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use WhitelistPRO\BankReconciliation\Http\Imports\TransactionImport;
use WhitelistPRO\BankReconciliation\Transaction;

class FileUploadController extends Controller
{
    /**
    * use 'WhitelistPRO\BankReconciliation::' namespace for call view file inside of bank package
    */

    public function index() {
        $transaction = Transaction::paginate(10);
        return view('WhitelistPRO\BankReconciliation::fileupload.list', compact('transaction'));
    }

    public function upload() {
        return view('WhitelistPRO\BankReconciliation::fileupload.upload');
    }

    public function store(Request $request) {

        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        try {
            $file = $request->file('file');
            $import = new TransactionImport();
            $demo = Excel::import($import, $file);

            session()->flash('success', 'Transaction Data will be uploded successfully');
            return redirect()->route('file.list');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    public function view($id) {

        /**
        * call table field dynamic
        */
        $post = new Transaction;
        $tableName = $post->getTable();
        $columns = Schema::getColumnListing($tableName);

        $tran = Transaction::find($id);
        return view('WhitelistPRO\BankReconciliation::fileupload.view', compact('tran', 'columns'));
    }
}
