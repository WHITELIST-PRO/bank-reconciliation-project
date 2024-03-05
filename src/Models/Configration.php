<?php

namespace WhitelistPRO\BankReconciliation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configration extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value'
    ];
}
