<?php

namespace WhitelistPRO\BankReconciliation\Http\Imports;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use WhitelistPRO\BankReconciliation\BankData;

class BankDataImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $row = $this->convertExcelDates($row);
        return new BankData([
            'date' => Str::lower($row['date']),
            'sender_name' => Str::lower($row['sendername']),
            'sender_account' => Str::lower($row['senderaccount']),
            'payment_reference' => Str::lower($row['paymentreference']),
            'amount' => Str::lower($row['amountvalue']),
            'amount_currency' => Str::lower($row['amountcurrency']),
            'fee_value' => Str::lower($row['feevalue']),
            'fee_currency' => Str::lower($row['feecurrency']),
            'reference_number' => Str::lower($row['referencenumber']),
            'business_name' => Str::lower($row['businessname']),
            'detail_type' => Str::lower($row['detailtype']),
            'transaction_id' => Str::lower($row['transactionid']),
            'type' => Str::lower($row['type']),
            'description' => Str::lower($row['description']),
        ]);
    }

    private function convertExcelDates(array $data)
    {
        if (isset($data['Date'])) {
            $data['Date'] = Carbon::createFromFormat('d-m-Y', '30-12-1899')->addDays($data['Date'])->toDateString();
        }

        return $data;
    }
}
