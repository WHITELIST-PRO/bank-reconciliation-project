<?php

namespace WhitelistPRO\BankReconciliation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorCombination extends Model
{
    use HasFactory;

    protected $fillable = [
        'complete_matching_percentage',
        'partial_matching_percentage',
        'complete_matching',
        'complete_matching_select',
        'partial_matching',
        'partial_matching_select',
    ];
}
