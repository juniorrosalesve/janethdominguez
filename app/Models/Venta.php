<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable     =   [
        'referencia',
        'currency_code',
        'total',
        'fullName',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'producto',
        'info',
        'precio'
    ];
}
