<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\book;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index', [
            'categories' => category::where('id','>',0)->orderBy('name', 'asc')->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoryRequest $request)
    {
        category::create($request->validated());
        return redirect()->route('categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, $id)
    {
        $category = category::find($request->id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $book = book::where("category_id",$request->id)->count();
        if($book >= 1){
        return view('category.index', [
            'error'=>'Cant Delete This Category Because Books Have Been Assigned To This Category Delete The Books First',
            'categories' => category::where('id','>',0)->orderBy('name', 'asc')->get(),
        ]);    
        }
        category::find($request->id)->delete();
        return redirect()->route('categories');
    }
}
