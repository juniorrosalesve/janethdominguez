<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Producto;

class ProductoController extends Controller
{
    public function index() {
        return view('products.index', [
            'productos' => Producto::all()
        ]);
    }

    public function store(Request $r)
    {
        $uniqueId = (string) Str::uuid();
        $extension   = $r->file('imagen')->getClientOriginalExtension();
        $imageName   =   $uniqueId . '.' . $extension;
        $imagePath = $r->file('imagen')->storeAs('productos', $imageName, 'public');

        $data   =   $r->except(['_token', 'imagen']);
        $data['rutaImagen']     =   $imageName;
        Producto::create($data);

        return '<script>alert("Registered Successfully!");location.href="'.route('productos').'"</script>';
    }

    public function delete($id) {
        $item   =   Producto::find($id);
        if(empty($item))
            return redirect()->route('productos');
        Producto::where('id', $id)->delete();
        if(Storage::disk('public')->exists('productos/'.$item->rutaImagen)) 
            Storage::disk('public')->delete('productos/'.$item->rutaImagen);
        return '<script>alert("Successfully removed!");location.href="'.route('productos').'"</script>';
    } 
}
