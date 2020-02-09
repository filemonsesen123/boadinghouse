<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller; 

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Food::all();
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
        'description'=>'required',
        'price'=>'required',
        'long'=>'required',
        'lat'=>'required',
        'category'=>'required',
        ]);
if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 201);            
        }
        $input = $request->all(); 
        $user = Food::create($input); 
        $success['name'] =  $user->name;
        $success['image'] =  $user->image;
        $success['description'] =  $user->description;
        $success['price'] =  $user->price;
        $success['long'] =  $user->long;
        $success['lat'] =  $user->lat;
        $success['category'] =  $user->category;
            return response()->json(['data'=>$success], $this-> successStatus); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $food)
    {
        $update = Category::where('id_food',$food)->update(['name'=>$request->name,'image'=>$request->image,'description'=>$request->description,'price'=>$request->price,'category'=>$request->category,'long'=>$request->long,'lat'=>$request->lat]);

        return response()->json($food, 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function food(Request $food)
    {
            $food = $food->food;
            return Food::where('id_food',$food) -> get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($food)
    {
        Food::where('id_food',$food) -> delete();

        return response()->json(null, 204);
    }
}
