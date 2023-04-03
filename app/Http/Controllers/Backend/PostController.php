<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
            ->join('departaments', 'posts.departament_id', 'departaments.id')
            ->join('provinces', 'posts.province_id', 'provinces.id')
            ->select('posts.*', 'categories.category_es', 'subcategories.subcategory_es', 'departaments.departament_es', 'provinces.province_es')
            ->orderBy('id', 'desc')->paginate(3);
        return view('backend.post.index', compact('posts'));
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
        $departaments = DB::table('departaments')
            ->select(DB::raw("CONCAT(departament_es,' | ',departament_en) AS departamento"), 'id')
            ->pluck('departamento', 'id');

        return view('backend.post.create', compact('categories', 'departaments'));

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
            'title_es' => 'required',
            'title_en' => 'required',
            'category_id' => 'required',
            'departament_id' => 'required',
        ]);
        // dd($request->all());
        $data = array();
        $data['title_es'] = $request->title_es;
        $data['title_en'] = $request->title_en;
        $data['user_id'] = Auth::user()->id;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['departament_id'] = $request->departament_id;
        $data['province_id'] = $request->province_id;
        $data['tags_es'] = $request->tags_es;
        $data['tags_en'] = $request->tags_en;
        $data['details_es'] = $request->details_es;
        $data['details_en'] = $request->details_en;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = now();
        $data['post_month'] = date('F');
        if ($request->image) {
            $image = Storage::put('posts', $request->image);
            $data['image'] = $image;
        }
        DB::table('posts')->insert($data);
        $notification = array(
            'messaje' => 'post registrado correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.posts.create')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post);
        $categories = DB::table('categories')
            ->select(DB::raw("CONCAT(category_es,' | ',category_en) AS categoria"), 'id')
            ->pluck('categoria', 'id');
        $departaments = DB::table('departaments')
            ->select(DB::raw("CONCAT(departament_es,' | ',departament_en) AS departamento"), 'id')
            ->pluck('departamento', 'id');

        return view('backend.post.edit', compact('categories', 'departaments', 'post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}