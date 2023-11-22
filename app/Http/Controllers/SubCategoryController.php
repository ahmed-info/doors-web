<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('pages.subcategory.index', compact('subcategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id'=>'required|string',
            'subTitle'=>'string|nullable',
            //'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=370,height=370',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096',
         ]);
         $subCategory = new SubCategory;
         $subCategory->category_id = $request->category_id;
         $subCategory->subTitle = $request->subTitle;
         //image
         if($request->file('image')){
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/subcategory",$filename); //move to file
            $subCategory->image = url('images/subcategory'.'/'.$filename);
         }

          $subCategory->save();
         return redirect()->route('dashboard.subcategory.index')->with('status', "add Sub Category created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(int $subID)
    {
        $categories = Category::all();
        $subcategory = SubCategory::where('subID',$subID)->first();

        return view('pages.subcategory.edit', compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCategoryRequest  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $subID)
    {
        $this->validate($request,[
            'category_id'=>'required|string',
            'title'=>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=370,height=370',
         ]);

         $subcategory = SubCategory::where('subID',$subID)->first();
         $subcategory->category_id = $request->category_id;
         $subcategory->title = $request->title;

         if($request->file('image')){
            $pathImage = "images/subcategory/". basename($subcategory->image);
            if(File::extension($pathImage)){
                File::delete($pathImage);
            }

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/subcategory",$filename); //move to file
            $subcategory->image = url( 'images/subcategory'.'/'.$filename);
         }

         $subcategory->update();
         return redirect()->route('dashboard.subcategory.index')->with('status', "sub category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $subID)
    {
        $subcategory = SubCategory::where('subID',$subID)->first();

        $pathImage = "images/subcategory/". basename($subcategory->image);
        if(File::extension($pathImage)){
            File::delete($pathImage);
        }

        $subcategory->delete();
        return redirect()->route('dashboard.subcategory.index')->with('status','Sub Category Deleted Successfully');
    }
}
