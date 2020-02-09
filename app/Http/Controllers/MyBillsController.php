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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MyBills::all();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function paid(Request $paid)
    {
        $paid = $paid->paid;
        return MyBills::where('status','paid') -> where('id_user',$paid)-> get();
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
        $mustpay = $mustpay->mustpay;
        return MyBills::where('status','mustpay') -> where('id_user',$mustpay)-> get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($mybills)
    {
        MyBills::where('id_bills',$mybills) -> delete();

        return response()->json(null, 204);
    }
}
