<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //Este método lo editamos para listar todos los registros de los productos
    public function index()
    {
        $productos = Productos::paginate();
        return view('home', compact('productos'));
    }

    public function destroyProduct(Request $request, $id)
    {
        //Con esto, verificamos si existe alguna solicitud AJAX
        if ($request->ajax()) {
            $producto = Productos::find($id);
            $producto->delete();

            $productos_total = Productos::all()->count();

            return response()->json([
                'total' => $productos_total,
                'mensaje' => $producto->name . 'fue eliminado correctamente'
            ]);
        }
    }
}
