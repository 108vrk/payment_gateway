<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers;
//use App\Payment;
use Redirect,Response;

class PaymentController extends Controller
{
    //
	public function show_products()
	{
		return view('payment');
	}

	public function pay_success(Request $request){
		$data = [
		'user_id' => '1',
		'payment_id' => $request->payment_id,
		'amount' => $request->amount,
		];
		//$getId = Payment::insertGetId($data);  
		$arr = array('msg' => 'Payment successful.', 'status' => true);
		return Response()->json($arr);    
	}

	public function thank_you()
	{
        return view('thankyou');
        
        
        //redirect('/my-store');
	}
}