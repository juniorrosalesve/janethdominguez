<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Venta;

class SalesController extends Controller
{
    public function index(Request $r) {
        return view('dashboard', [
            'ventas' => Venta::orderBy('created_at', 'asc')->get()
        ]);
    }
}
