<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller; 

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public $successStatus = 200;
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
        'name'=>'required',
        'image'=>'required',
        'table'=>'required'
        ]);
if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 201);            
        }
        $input = $request->all(); 
        $user = Category::create($input); 
        $success['name'] =  $user->name;
        $success['image'] =  $user->image;
        $success['table'] =  $user->table;
            return response()->json(['data'=>$success], $this-> successStatus); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return response()->json($category, 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function table(Request $table)
    {
        $table = $table->table;
        return Category::where('table',$table) -> get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $category)
    {
        Category::where('id_category',$category) -> delete();

        return response()->json(null, 204);
    }
}
