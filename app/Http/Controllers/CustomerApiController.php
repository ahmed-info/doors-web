<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class CustomerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json(['message'=>"success","users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $valid = $request->validate([
            'name' => 'nullable|string',
            'phone' => 'required|unique:users'
        ]);

                return response()->json(['message'=>'success','users'=>"allll"],200);




        // if($valid->fails()){
        // return response()->json(['message'=>'validation fails'],422);
        // }

        $customer = Customer::create([
            'name'=>$request->name,
            'mobile'=>$request->mobile
            //,'remember_token'=>$token
        ]);
        $token =  $customer->createToken('remember_token')->plainTextToken;

        return response()->json(['message'=>'register added sucessfully','data'=>$customer,'token'=>$token],200);
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'mobile' => 'required'
         ]);
        $customer = Customer::where('mobile',$request->mobile)->first();
        $customer->mobile = $request->mobile;

        if(!$customer){
            return response()->json(['message'=>'ادخل رقم الموبايل الصحيح']);
        }else{
            $token =  $customer->createToken('CustomersToken')->plainTextToken;
            return response()->json(['message'=>'login sucessfully','data'=>$request->all(),'token'=>$token],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
