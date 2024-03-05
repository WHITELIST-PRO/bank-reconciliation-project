<?php

namespace WhitelistPRO\BankReconciliation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * transactions table's model
 */

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<float, string>
     */
    protected $fillable = [
        'identifier',
        'type',
        'date',
        'customer_code',
        'business_name',
        'fiscal_code',
        'vat_number',
        'registration_number',
        'payment_method_type',
        'fb_platform_id',
        'amount',
        'amount_usd',
        'transfer_reason',
        'lender_business_name',
    ];
}
