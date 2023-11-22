<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartApiController extends Controller
{
    public function allCart(int $userId){
        $carts = Cart::where('user_id',$userId)->get();
        return response()->json(["message"=>"success","carts"=>$carts],200);
    }

   public function store(Request $request) {
    $valid = $request->validate([
            'user_id' => 'required',
            'product_id' => 'required'
        ]);
     
        $cart = new Cart;
         $cart->user_id = $request->user_id;
         $cart->product_id = $request->product_id;

        $cart->save();

    return response()->json(["message"=>"success","cart"=>$cart],200);

   }

   public function removeCart(int $prodID, int $userid) {
        $user = User::find($userid);
        $product = Product::find($prodID);

        if($user !=null && $product !=null){

            $cart0 = DB::table('carts')->select('*')
            ->where('user_id','=',$userid)
            ->where('product_id','=', $prodID)
            ->where('cart_order','=', 0)
            ->first();

            $cart = DB::table('carts')
                     ->where('cartID','=',$cart0->cartID);
            if($cart != null){
                $cart->delete();
                return response()->json(["message"=>"success"],200);

            }else{

                return response()->json(["message"=>"fail"]);
            }
        }else{
            return response()->json(["message"=>"fail"]);

        }
   }
   public function getCountProduct(int $prodID, int $userid) {
    $user = User::find($userid);
        $product = Product::find($prodID);
        if($user !=null && $product !=null){
            $count = Cart::where('user_id','=',$userid)->where('product_id','=',$prodID)->where('cart_order',0)->count();
            return response()->json(["message"=>"success","count"=>$count],200);
        }else{
            return response()->json(["message"=>"fail",]);

        }
        
   }

   public function cartView(int $userid) {
    $cartview =   DB::table('cartview')->where('cartview.user_id',$userid)->get();

    $result = DB::table('cartview')->where('cartview.user_id',$userid)->groupBy('cartview.user_id')
    ->first( array(
        DB::raw( 'SUM(cartview.productPrice) AS totalprice' ),
        DB::raw( 'SUM(cartview.countProduct) AS totalcount' ),
    ));

    if($cartview != []){
        return response()->json(["message"=>"success","cartviews"=>$cartview,"total"=>$result],200);
    }else{
        return response()->json(["message"=>"failure"],200);
    }
   }
}
