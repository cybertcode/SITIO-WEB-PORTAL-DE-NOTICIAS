<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Departament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departaments = DB::table('departaments')->orderBy('id', 'desc')->paginate(3);

        return view('backend.departament.index', compact('departaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.departament.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'departament_es' => 'required|min:2|string|unique:departaments,departament_es',
            'departament_en' => 'required|min:2|string|unique:departaments,departament_en',
        ]);
        $data = array();
        $data['departament_es'] = $request->departament_es;
        $data['departament_en'] = $request->departament_en;
        DB::table('departaments')->insert($data);
        $notification = array(
            'messaje' => 'Departamento registrado correctamente',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.departaments.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function show(Departament $departament)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function edit(Departament $departament)
    {
        return view('backend.departament.edit', compact('departament'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departament $departament)
    {
        $request->validate([
            'departament_es' => 'required|min:2|string|unique:departaments,departament_es,' . $departament->id,
            'departament_en' => 'required|min:2|string|unique:departaments,departament_en,' . $departament->id,
        ]);
        $data = array();
        $data['departament_es'] = $request->departament_es;
        $data['departament_en'] = $request->departament_en;
        DB::table('departaments')->where('id', $departament->id)->update($data);

        $notification = array(
            'messaje' => 'Departamento actualidado correctamente',
            'alert-type' => 'warning',
        );
        return redirect()->route('admin.departaments.edit', $departament)->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departament $departament)
    {
        DB::table('departaments')->where('id', $departament->id)->delete();
        $notification = array(
            'messaje' => 'Departamento eliminado correctamente',
            'alert-type' => 'error',
        );
        return redirect()->route('admin.departaments.index')->with($notification);
    }
    // Para traer las subcategories
    public function all($departament_id)
    {
        $sub = DB::table('provinces')->where('departament_id', $departament_id)->get();
        return response()->json($sub);
    }
}