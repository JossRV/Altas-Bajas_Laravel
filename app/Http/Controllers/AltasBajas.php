<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Tipo;
use App\Models\Registro;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AltasBajas extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('inicio');
    }
    public function inicio()
    {
        $gasto = 0;
        $ganancia = 0;
        $AB = Registro::select('t_registros.cantidad', 't_cat_tipos.tipos')
            ->join('t_cat_tipos', 't_cat_tipos.id', 't_registros.tipo')
            ->get();
        foreach ($AB as $altaBaja) {
            if ($altaBaja->tipos == 'gasto') {
                $gasto += $altaBaja->cantidad;
            } elseif ($altaBaja->tipos == 'ganancia') {
                $ganancia += $altaBaja->cantidad;
            }
        }
        $titulo = 'Altas-Bajas';
        toast($titulo, 'success');
        return view('modules/cliente/inicio', compact('titulo', 'AB', 'gasto', 'ganancia'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = 'Altas-Bajas';
        // $AB = Registro::join('t_cat_tipos','t_cat_tipos.id','=','t_registros.tipo')->join('t_cat_categorias','t_cat_categorias.id','=','t_registros.categoria')->select('t_registros.cantidad','t_registros.descripcion','t_registros.id','t_registros.created_at','t_cat_categorias.tipo_categoria','t_cat_tipos.tipo')->get();
        // $AB = Registro::join('t_cat_tipos','t_cat_tipos.id','t_registros.tipo')->join('t_cat_categorias','t_cat_categorias.id','t_registros.categoria')->select('t_registros.cantidad','t_registros.descripcion','t_registros.id','t_registros.created_at','t_cat_categorias.tipo_categoria','t_cat_tipos.tipo')->get();
        $AB = Registro::select('t_registros.cantidad', 't_registros.descripcion', 't_registros.id', 't_registros.created_at', 't_cat_categorias.tipo_categoria', 't_cat_tipos.tipos')
            ->join('t_cat_categorias', 't_cat_categorias.id', 't_registros.categoria')
            ->join('t_cat_tipos', 't_cat_tipos.id', 't_registros.tipo')
            ->get();
        // $AB = Registro::all();
        // si se agregan mas alerts, se interpone y muestra la superiro que este alert
        // toast("Registros","success");
        return view('modules/cliente/altasBajas', compact('titulo', 'AB'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        $titulo = 'Altas-Bajas';
        return view('modules/cliente/nuevoAB', compact('titulo', 'categorias', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $descripcion = $request->filled('descripcion') ? $request->input('descripcion') : 'Sin descripcion';
        $altasBajas = new Registro();
        $altasBajas->tipo = $request->tipo;
        $altasBajas->categoria = $request->categoria;
        $altasBajas->cantidad = $request->cantidad;
        $altasBajas->descripcion = $descripcion;
        if (!$altasBajas->save()) {
            Alert::error('Error', 'No se guardo el registro...');
            return back()->route('nuevoAB');
        }
        // no se puede hacer return a un alert
        Alert::success('Guardado!', 'El registro se guardo correctamente');
        return redirect()->route('AB');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $titulo = 'Altas-Bajas';
        $AB = Registro::select('t_registros.cantidad', 't_registros.descripcion', 't_registros.id', 't_cat_categorias.tipo_categoria', 't_cat_tipos.tipos')
            ->join('t_cat_categorias', 't_cat_categorias.id', 't_registros.categoria')
            ->join('t_cat_tipos', 't_cat_tipos.id', 't_registros.tipo')
            ->where('t_registros.id', $id)
            ->first();
        return view('modules/cliente/eliminar', compact('titulo', 'AB'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AB = Registro::select('t_registros.cantidad', 't_registros.descripcion', 't_registros.id', 't_cat_categorias.tipo_categoria', 't_cat_tipos.tipos', 't_registros.tipo', 't_registros.categoria')
            ->join('t_cat_categorias', 't_cat_categorias.id', 't_registros.categoria')
            ->join('t_cat_tipos', 't_cat_tipos.id', 't_registros.tipo')
            ->where('t_registros.id', $id)
            ->first();
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        $titulo = 'Altas-Bajas';
        return view('modules/cliente/editarAB', compact('titulo', 'AB', 'categorias', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $descripcion = $request->filled('descripcion') ? $request->input('descripcion') : 'Sin descripcion';
        $altasBajas = Registro::find($id);
        $altasBajas->cantidad = $request->cantidad;
        $altasBajas->descripcion = $descripcion;
        if (!$altasBajas->save()) {
            Alert::error('Error', 'No se actualizo el registro...');
            // return back()->route('editarAB');
        }
        // no se puede hacer return a un alert
        Alert::success('Actualizado!', 'El registro se actualizo correctamente');
        return redirect()->route('AB');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $altasBajas = Registro::find($id);
        $altasBajas->delete();
        if (!$altasBajas->delete()) {
            Alert::error('Error', 'No se elimino el registro...');
            // return back()->route('editarAB');
        }
        Alert::success('Eliminado!', 'El registro se elimino correctamente');
        return redirect()->route('AB');
    }
    public function agregarTipos()
    {
        $item = new Tipo();
        $item->tipos = 'Ganancias';
        $item->save();
        return $item;
    }
    public function agregarCat()
    {
        $item = new Categoria();
        $item->tipo_categoria = 'Amazon';
        $item->save();
        return $item;
    }
}
