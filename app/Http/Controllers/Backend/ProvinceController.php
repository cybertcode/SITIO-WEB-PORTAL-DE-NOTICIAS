<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = DB::table('provinces')
            ->join('departaments', 'provinces.departament_id', 'departaments.id')
            ->select('provinces.*', 'departaments.departament_es')
            ->orderBy('id', 'desc')->paginate(3);
        return view('backend.province.index', compact('provinces'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departaments = DB::table('departaments')
            ->select(DB::raw("CONCAT(departament_es,' | ',departament_en) AS departamento"), 'id')
            ->pluck('departamento', 'id');
        return view('backend.province.create', compact('departaments'));

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
            'province_es' => 'required|min:2|string|unique:provinces,province_es',
            'province_en' => 'required|min:2|string|unique:provinces,province_en',
            'departament_id' => 'required',
        ]);
        $data = array();
        $data['province_es'] = $request->province_es;
        $data['province_en'] = $request->province_en;
        $data['departament_id'] = $request->departament_id;
        DB::table('provinces')->insert($data);
        $notification = array(
            'messaje' => 'Provincia registrado correctamente',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.provinces.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        $provincy = DB::table('provinces')->where('id', $province->id)->first();
        $departaments = DB::table('departaments')
            ->select(DB::raw("CONCAT(departament_es,' | ',departament_en) AS departament"), 'id')
            ->pluck('departament', 'id');
        return view('backend.province.edit', compact('province', 'departaments'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        $request->validate([
            'province_es' => 'required|min:2|string|unique:provinces,province_es,' . $province->id,
            'province_en' => 'required|min:2|string|unique:provinces,province_en,' . $province->id,
            'departament_id' => 'required',
        ]);
        $data = array();
        $data['province_es'] = $request->province_es;
        $data['province_en'] = $request->province_en;
        $data['departament_id'] = $request->departament_id;
        DB::table('provinces')->where('id', $province->id)->update($data);
        $notification = array(
            'messaje' => 'Provincia actualizado correctamente',
            'alert-type' => 'warning',
        );
        return redirect()->route('admin.provinces.edit', $province->id)->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        DB::table('provinces')->where('id', $province->id)->delete();
        $notification = array(
            'messaje' => 'Provincia eliminado correctamente',
            'alert-type' => 'error',
        );
        return redirect()->route('admin.provinces.index')->with($notification);

    }
}