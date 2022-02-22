<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Producto_Escandallos;
use App\resources\views\producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos']= Productos::paginate(5);
        $total=0;
        $prdTotal=[];

        foreach ( $datos['productos'] as $prd) {
            echo "<br>producto:".$prd->id. " Coste: ".$prd->PrecioCosto."<br>";
            $escandallos = new Producto_Escandallos();
            $total=$escandallos->findEscandallos($prd->id, 0);

            $prdTotal[$prd->id]=$total;

            echo "<br>Coste total: ".$total;

        }

        //print_r($datos['id']);
        //print_r($datos['productos']['id']);


        return view('producto.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosProductos=request()->except('_token');
        Productos::insert($datosProductos);
        return redirect('producto')->with('mensaje','Producto agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
        $producto=Productos::findOrFail($id);
        return view('producto.edit' , compact('producto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, INT $id)
    {
        $datosProductos = request()->except(['_token','_method']);
        Productos::where('id', '=', $id)->update($datosProductos);
        $producto=Productos::findOrFail($id);
        return redirect('producto')->with('mensaje','Producto editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Producto::destroy($id);
        return redirect('producto');
    }
}
