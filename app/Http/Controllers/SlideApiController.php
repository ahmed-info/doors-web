<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;

class SlideApiController extends Controller
{
    public function index(){
        $slides = Slide::all();
        return response()->json(['message'=>"success","data"=>$slides]);
    }
}
