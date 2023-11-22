<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productview;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;

class ProductApiController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json(['message'=>"success","products"=>$products]);
    }

    public function show($subID, $userid = null) {
        if($userid == null|| $userid == 'null'){
       $products = Product::where('subcategory_id',$subID)->get();
        return response()->json(['message'=>"success","products"=>$products]);

        }
       //get data by procedure
        $getProductFavoriteByUserId = DB::select('CALL getProductAndfavByUserId(?, ?)', [$userid, $subID]);
        return  response()->json(['message'=>"success","products"=>$getProductFavoriteByUserId]);

    }
    public function allproducts(){
        $products = Product::all();
        return response()->json(['message'=>"success","products"=>$products]);
    }

    public function search(string $search) {
        //$products = Product::where('title', 'LIKE', '%'.$search.'%')->get();

        $products = DB::table('product_view')->where('title','LIKE','%'.$search.'%')->get();
        return  response()->json(['message'=>"success","products"=>$products]);
    }
}