<?php

namespace WhitelistPRO\BankReconciliation\Http\Imports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use WhitelistPRO\BankReconciliation\Transaction;

class TransactionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $row = $this->convertExcelDates($row);

        return new Transaction([
            'identifier' => $row['identifier'],
            'type' => $row['type'],
            'date' => $row['created_at'],
            'customer_code' => $row['customer_code'],
            'business_name' => $row['business_name'],
            'fiscal_code' => $row['fiscal_code'],
            'vat_number' => $row['vat_number'],
            'registration_number' => $row['registration_number'],
            'payment_method_type' => $row['payment_method_type'],
            'fb_platform_id' => $row['fb_platform_id'],
            'amount' => $row['amount'],
            'amount_usd' => $row['amount_usd'],
            'transfer_reason' => $row['transfer_reason'],
            'lender_business_name' => $row['lender_business_name'],
        ]);

    }

    private function convertExcelDates(array $data)
    {
        if (isset($data['created_at'])) {
            $data['created_at'] = Carbon::createFromFormat('d-m-Y', '30-12-1899')->addDays($data['created_at'])->toDateString();
        }

        return $data;
    }
}
