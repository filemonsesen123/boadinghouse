<?php

namespace App\Http\Controllers;

use App\MyBills;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller; 
use Carbon\Carbon;

class MyBillsController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function paid(Request $paid)
    {
        $id_category = $paid->id_category;
        $id_user = $paid->id_user;
        return MyBills::where('status','paid') -> where('id_user',$id_user)-> where('id_category',$id_category)-> get();
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
       $today = Carbon::today();
       $success = new MyBills([
        'id_user' => $request->get('id_user'),
        'status'=> 'mustpay',
        'id_category' => $request->get('id_category'),
        'price'=> $request->get('price'),
        'paid' => $today->toDateString(),
        'must_pay' => $today->addMonth()->toDateString(),
      ]);
      $success->save();
            return response()->json(['data'=>$success], $this-> successStatus); 
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyBills $mybills)
    {
        $update = MyBills::where('id_bills',$request->get('id_bills'))->update(['status'=>'paid']);
       $today = Carbon::today();
       $success = new MyBills([
        'id_user' => $request->get('id_user'),
        'status'=> 'mustpay',
        'id_category' => $request->get('id_category'),
        'price'=> $request->get('price'),
        'paid' => $today->toDateString(),
        'must_pay' => $today->addMonth()->toDateString(),
      ]);
      $success->save();
        return response()->json($success, 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function mustpay(Request $mustpay)
    {
        $id_category = $mustpay->id_category;
        $id_user = $mustpay->id_user;
        return MyBills::where('status','mustpay') -> where('id_user',$id_user)-> where('id_category',$id_category)-> get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $mybills)
    {
        MyBills::where('id_bills',$mybills) -> delete();

        return response()->json(null, 204);
    }
}
