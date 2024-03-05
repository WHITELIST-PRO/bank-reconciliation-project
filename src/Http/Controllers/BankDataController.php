<?php

namespace WhitelistPRO\BankReconciliation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use WhitelistPRO\BankReconciliation\Models\BankData;
use WhitelistPRO\BankReconciliation\Http\Imports\BankDataImport;

class BankDataController extends Controller
{
    /**
    * use 'WhitelistPRO\BankReconciliation::' namespace for call view file inside of bank package
    */

    public function index()
    {
        $bank = BankData::paginate(10);
        return view('WhitelistPRO\BankReconciliation::bankdata.list', compact('bank'));
    }

    public function upload()
    {
        return view('WhitelistPRO\BankReconciliation::bankdata.upload');
    }

    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        try {
            $file = $request->file('file');
            $import = new BankDataImport();
            $demo = Excel::import($import, $file);

            session()->flash('success', 'Bank Data will be uploded successfully');
            return redirect()->route('bank.list');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    public function view($id)
    {

        /**
         * call table field dynamic
         */
        $post = new BankData;
        $tableName = $post->getTable();
        $columns = Schema::getColumnListing($tableName);

        $bank = BankData::find($id);
        return view('WhitelistPRO\BankReconciliation::bankdata.view', compact('bank', 'columns'));
    }
}
