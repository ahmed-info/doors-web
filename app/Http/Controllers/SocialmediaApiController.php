<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Socialmedia;

class SocialmediaApiController extends Controller
{
    public function index(){
        $socialmedia = Socialmedia::first();

        return response()->json(['message'=>"success","data"=>$socialmedia]);
    }
}
