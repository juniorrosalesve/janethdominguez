<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Venta;
use App\Models\Producto;

class PaymentController extends Controller
{
    public function register_payment(Request $r) {
        $data       =   $r->all();
        $producto   =   Producto::find($r->itemId);

        $transaction    =   $data['transaction'];
        $shipping   =   $data['shipping'];

        if(empty($producto))
            return 0;
        $pr     =   [];
        $pr['referencia']   =   $transaction['id'];
        $pr['currency_code']    =   $transaction['amount']['currency_code'];
        $pr['total']    =   $transaction['amount']['value'];
        $pr['fullName']     =   $shipping['fullName'];
        $pr['phone']        =   "+573102144531";
        $pr['email']        =   "junior@admin.com";
        $pr['address']      =   $shipping['address'];
        $pr['city']         =   $shipping['city'];
        $pr['state']        =   $shipping['state'];
        $pr['zip']          =   $shipping['zip'];
        $pr['country']      =   $shipping['country'];
        $pr['producto']     =   $producto->nombre;
        $pr['info']         =   $producto->info;
        $pr['precio']       =   $producto->precio;

        Venta::create($pr);
        return 1;
    }
}
