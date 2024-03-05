<?php

namespace WhitelistPRO\BankReconciliation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * bank_datas table's model
 */
class BankData extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<float, string>
     */
    protected $fillable = [
        'date',
        'sender_name',
        'sender_account',
        'payment_reference',
        'amount',
        'amount_currency',
        'fee_value',
        'fee_currency',
        'reference_number',
        'business_name',
        'detail_type',
        'transaction_id',
        'type',
        'description',
    ];
}
