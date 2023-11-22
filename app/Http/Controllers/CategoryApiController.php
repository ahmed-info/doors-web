<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Slide;

class CategoryApiController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $slides = Slide::all();
        return response()->json(['message'=>"success","slides"=>$slides,"categories"=>$categories,"subcategories"=>$subcategories]);
    }

}
