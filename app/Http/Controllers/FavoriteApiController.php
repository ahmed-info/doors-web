<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class FavoriteApiController extends Controller
{
    public function addFavorite(Request $request) {
        $valid = $request->validate([
            'user_id' => 'required',
            'product_id' => 'required'
        ]);

        $favorite = new Favorite;
         $favorite->user_id = $request->user_id;
         $favorite->product_id = $request->product_id;

          $favorite->save();

        return response([
            'message'=>'success',
            'favorites'=>$favorite,
        ],200);
        // return response()->json(['message'=>'success','users'=>"ahmed Auth"],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $userId
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function removeFavorite(int $prodID, int $userid){
        $user = User::find($userid);
        $product = Product::find($prodID);

        if($user !=null && $product !=null){
            $favorite = Favorite::where('user_id',$user->id)->where('product_id',$product->prodID)->first();
            if($favorite != null){
                $favorite->delete();
                return response()->json(["message"=>"success"],200);

            }else{

                return response()->json(["message"=>"fail"]);
            }
        }else{
            return response()->json(["message"=>"fail"]);

        }
    }

    public function deleteMyFavorite(int $id){
        $favorite = Favorite::find($id);
        if($favorite){
            $favorite->delete();
            return response()->json(["message"=>"success"],200);
        }
        
    }

    public function allFavorite(int $userId){

    
        $favorites = DB::table('myfavorite')->where('user_id',$userId)->get();
        return response()->json(["message"=>"success","myfavorites"=>$favorites],200);
    }

    public function favorite(int $userId){
        $favorites = Favorite::where('user_id',$userId)->first();

        $products = Product::where('id',$favorites->product_id)->whereRaw('selectForYou as dddd',0)
        ->get();
            return $products;
        // $favorites = Favorite::where('user_id',$userId)->get();
        // if($favorites != null && $favorites != []){
        //     return response()->json(["message"=>"success","favorites"=>$favorites],200);
        // }else{
        //     return response()->json(["message"=>"fail"]);
        // }
    }
}
