<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use Validator;
use App\Laundry;
use App\MyBills;
use App\PublicFacility;

class ApiController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function food(Request $category)
    {
        $category = $category->category;
        return Food::where('category',$category) -> get();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function publicfac(Request $category)
    {
        $category = $category->category;
        return PublicFacility::where('category',$category) -> get();
    }


}
