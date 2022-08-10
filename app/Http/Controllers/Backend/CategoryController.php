<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(3);
        // dd($categories);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            'category_es' => 'required|min:2|string|unique:categories,category_es',
            'category_en' => 'required|min:2|string|unique:categories,category_en',
        ]);
        $data = array();
        $data['category_es'] = $request->category_es;
        $data['category_en'] = $request->category_en;
        DB::table('categories')->insert($data);
        $notification = array(
            'messaje' => 'Categoría registrado correctamente',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.categories.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category);
        return view('backend.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_es' => 'required|min:2|string|unique:categories,category_es,' . $category->id,
            'category_en' => 'required|min:2|string|unique:categories,category_en,' . $category->id,
        ]);
        $data = array();
        $data['category_es'] = $request->category_es;
        $data['category_en'] = $request->category_en;
        DB::table('categories')->where('id', $category->id)->update($data);

        $notification = array(
            'messaje' => 'Categoría actualidado correctamente',
            'alert-type' => 'warning',
        );
        return redirect()->route('admin.categories.edit', $category)->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        DB::table('categories')->where('id', $category)->delete();
        $notification = array(
            'messaje' => 'Categoría eliminado correctamente',
            'alert-type' => 'error',
        );
        return redirect()->route('admin.categories.index')->with($notification);

    }
}