<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    PROTECTED $fillable = [
        'payment_type',
        'another_detail',
        'subTotal',
        'Total',
        'detail_invoices_id'
    ];

    use HasFactory;
}
