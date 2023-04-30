<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return $category;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:5',
        ]);
        $category = new Category();
        $category-> name=$request->input('name');
        $category-> description=$request->input('description');
        //$category->id=$request->input('id');
        $category->save();
        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:3|max:15',
            'description'=>'required|min:2',
        ]);
        $category = Category::find($id);
        $category-> name=$request->input('name');
        $category-> description=$request->input('description');
        //$post->id=$request->input('id');
        $category->save();
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if(is_null($category))
        {
            return response()->json('no se pudo eliminar.');
        }else{
            $category->delete();
            return ['Eliminado'];
        }
    }
}
