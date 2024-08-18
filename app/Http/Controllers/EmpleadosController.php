<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['Empleados']= Empleados::paginate();
        return view('empleados.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=> 'string|max:100',
            'apellidos'=> 'string|max:100',
            'email' => 'email',
            'foto'=>'nullable|mimes:jpg,png,jpeg'
        ];

        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
 
        $datosEmpleado=request()->except('_token');
        if ($request->hasFile('image')){
            $datosEmpleado['image']= $request->file('image')->store('uploads','public');
        }
        Empleados::insert($datosEmpleado);
        return redirect('empleados')->with('Mensaje','Empleado agregado con exito'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $Empleado=Empleados::findOrFail( $id );
        return view('empleados.edit', compact('Empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        
        $datosEmpleado=request()->except(['_token','_method']);
        
        if ($request->hasFile('image')){
            
            $Empleado=Empleados::findOrFail( $id );
            if (Storage::exists('public/'.$Empleado->image)) {
                Storage::delete('public/'.$Empleado->image);
            }
            
            $datosEmpleado['image']= $request->file('image')->store('uploads','public');
        }
        Empleados::where('id','=', $id)->update($datosEmpleado);

        //$Empleado=Empleados::findOrFail( $id );
        //return view('empleados.edit', compact('Empleado'));
        return redirect('empleados')->with('Mensaje','Empleado modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Empleado=Empleados::findOrFail( $id );
        
        if (Storage::delete('public/'.$Empleado->image)) {
            Empleados::destroy($id);
        }
        Empleados::destroy($id);
        return redirect('empleados')->with('Mensaje','Empleado eliminado existosamente'); 
    }
}
