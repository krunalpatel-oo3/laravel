<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Hash;

class LoginController extends Controller
{
    public function loginProcess(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'email' => 'required|email',
    		'password' => 'required'
    	]);
    	if($validator->passes()){
    		if(Auth::attempt(['email' => trim($request->email), 'password' => trim($request->password)])){
    			 $request->session()->regenerate();
    			// $request->session()->flush();
    			 $msg = array('status' => true,'message' => 'Login Successful');
    			 return response()->json($msg);

    		}else{
    			// DB::table('users')->insert(['name'=>'k', 'email'=>$request->email,'password' => Hash::make($request->password) ]);
    			$msg = array('status' =>false,'message' => 'Invalid Username and password.');
    			return response()->json($msg);
    		}	
    	}else{
    		$msg = array('status' =>false,'message' => $validator->errors()->first());
    		return response()->json($msg);
    	}
    }
}
