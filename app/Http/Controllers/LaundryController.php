<?php

namespace App\Http\Controllers;

use App\Laundry;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller; 

class LaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Laundry::all();
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
        'price'=>'required',
        'long'=>'required',
        'lat'=>'required',
        ]);
if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 201);            
        }
        $input = $request->all(); 
        $user = Laundry::create($input); 
        $success['name'] =  $user->name;
        $success['image'] =  $user->image;
        $success['price'] =  $user->price;
        $success['long'] =  $user->long;
        $success['lat'] =  $user->lat;
            return response()->json(['data'=>$success], $this-> successStatus); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $laundry)
    {
        $update = Laundry::where('id_laundry',$laundry)->update(['name'=>$request->name,'image'=>$request->image,'description'=>$request->description,'price'=>$request->price,'category'=>$request->category,'long'=>$request->long,'lat'=>$request->lat])

        return response()->json($laundry, 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function laundry(Request $laundry)
    {
            $laundry = $laundry->laundry;
            return Laundry::where('id_laundry',$laundry) -> get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($laundry)
    {
        Laundry::where('id_laundry',$laundry) -> delete();

        return response()->json(null, 204);
    }
}
