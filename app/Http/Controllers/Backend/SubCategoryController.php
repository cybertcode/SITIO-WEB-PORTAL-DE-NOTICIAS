<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_es')
            ->orderBy('id', 'desc')->paginate(3);
        return view('backend.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')
            ->select(DB::raw("CONCAT(category_es,' | ',category_en) AS categoria"), 'id')
            ->pluck('categoria', 'id');
        return view('backend.subcategory.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'subcategory_es' => 'required|min:2|string|unique:subcategories,subcategory_es',
            'subcategory_en' => 'required|min:2|string|unique:subcategories,subcategory_en',
            'category_id' => 'required',
        ]);
        $data = array();
        $data['subcategory_es'] = $request->subcategory_es;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->insert($data);
        $notification = array(
            'messaje' => 'Subcategoría registrado correctamente',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.subcategories.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        $categories = DB::table('categories')
            ->select(DB::raw("CONCAT(category_es,' | ',category_en) AS categoria"), 'id')
            ->pluck('categoria', 'id');
        return view('backend.subcategory.edit', compact('subcategory', 'categories'));

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
        $request->validate([
            'subcategory_es' => 'required|min:2|string|unique:subcategories,subcategory_es,' . $id,
            'subcategory_en' => 'required|min:2|string|unique:subcategories,subcategory_en,' . $id,
            'category_id' => 'required',
        ]);
        $data = array();
        $data['subcategory_es'] = $request->subcategory_es;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->where('id', $id)->update($data);
        $notification = array(
            'messaje' => 'Subcategoría actualizado correctamente',
            'alert-type' => 'warning',
        );
        return redirect()->route('admin.subcategories.edit', $id)->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = array(
            'messaje' => 'Subcategoría eliminado correctamente',
            'alert-type' => 'error',
        );
        return redirect()->route('admin.subcategories.index')->with($notification);

    }
    // Para traer las subcategories
    public function all($category_id)
    {
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response()->json($sub);
    }
}