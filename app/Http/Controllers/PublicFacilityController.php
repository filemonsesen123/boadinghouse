<?php

namespace App\Http\Controllers;

use App\PublicFacility;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller; 

class PublicFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PublicFacility::all();
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
        'buka'=>'required',
        'tutup'=>'required',
        'long'=>'required',
        'lat'=>'required',
        'category'=>'required',
        ]);
if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 201);            
        }
        $input = $request->all(); 
        $user = PublicFacility::create($input); 
        $success['name'] =  $user->name;
        $success['image'] =  $user->image;
        $success['description'] =  $user->description;
        $success['buka'] =  $user->buka;
        $success['tutup'] =  $user->tutup;
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
    public function update(Request $request, $public)
    {
        $update = PublicFacility::where('id_public_facility',$public)->update(['name'=>$request->name,'image'=>$request->image,'description'=>$request->description,'buka'=>$request->buka,'tutup'=>$request->tutup,'category'=>$request->category,'long'=>$request->long,'lat'=>$request->lat])

        return response()->json($public, 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function publicfac(Request $request, $publicfac)
    {
            $publicfac = $publicfac->publicfac;
            return Laundry::where('id_public_facility',$publicfac) -> get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($public)
    {
        PublicFacility::where('id_public_facility',$public) -> delete();

        return response()->json(null, 204);
    }
}
