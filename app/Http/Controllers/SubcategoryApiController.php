<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryApiController extends Controller
{
    public function index(){
        $sucategories = Subcategory::all();

        return response()->json(['message'=>"success","data"=>$sucategories]);
    }
    public function getCategorySubcategory(){
        $getall =   Category::select('categories.*','sub_categories.subTitle as subcategoryName','sub_categories.image as subcategoryImage')
                ->join('sub_categories', 'categories.cateID', '=', 'sub_categories.category_id')
                ->get();
            return response()->json(['message'=>"success","data"=>$getall]);
    }
    public function getSubcategories(int $id){

     $getall =   Category::select('categories.cateID', 'categories.title','categories.image','sub_categories.subTitle as subcategoryName','sub_categories.image as subcategoryImage')
        	->join('sub_categories', 'categories.cateID', '=', 'sub_categories.category_id')
        	->get();
        return response()->json(['message'=>"success","subcategories"=>$getall]);

        $subcategories = Subcategory::where('category_id', $id)->get();
        return response()->json(['message'=>"success","data"=>$subcategories]);
        return response()->json(['message'=>"success","data"=>$subcategories]);

    }
}
