<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function index()
    {
        $categories = Category::all();
        return view("pages.category.index",compact('categories'));
    }

    function create() {
        return view("pages.category.create");
    }

    function store(Request $request) {
        $this->validate($request,[
            'title'=>'required|string',
            // 'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=1920,height=650',

         ]);
         $category = new Category;
         $category->title = $request->title;
         if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/category",$filename); //move to file
            $category->image = url('images/category'.'/'.$filename);

         }
          $category->save();
         return redirect()->route('dashboard.category.index')->with('status', "category created successfully");
    }

    function edit(int $cateID) {

        $category = Category::where('cateID',$cateID)->first();
        return view('pages.category.edit',compact('category'));
    }

    function update(Request $request,int $cateID) {
        $this->validate($request,[
            'title'=>'string|nullable',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=370,height=370',
         ]);

         $category = Category::where('cateID',$cateID)->first();
         $category->title = $request->title;
         if($request->file('image')){
            $pathImage = "images/category/". basename($category->image);
            if(File::extension($pathImage)){
                File::delete($pathImage);
            }

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/category",$filename); //move to file
            $category->image = url( 'images/category'.'/'.$filename);
         }

         $category->update();
         return redirect()->route('dashboard.category.index')->with('status', "company updated successfully");

    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cateID)
    {
        $category = Category::find($cateID);

        $pathImage = "images/category/". basename($category->image);
        if(File::extension($pathImage)){
            File::delete($pathImage);
        }

        $category->delete();
        return redirect()->route('dashboard.category.index')->with('status','Category Deleted Successfully');
    }

}
