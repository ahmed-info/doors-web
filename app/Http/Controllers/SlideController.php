<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class SlideController extends Controller
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
    public function index()
    {
        $slides = Slide::all();
        return view('pages.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        return view('pages.slide.create',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|nullable',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=1920,height=650',
         ]);
         $slide = new Slide;
         $slide->title = $request->title;
        //image
        if($request->file('image')){

        $image = $request->file('image');
        $filename = time().'_'.$image->getClientOriginalName();
        $filename = str_replace(' ','-',$filename);
        $image->move("images/slide",$filename); //move to file
        $slide->image = url('images/slide'.'/'.$filename);

        }

          $slide->save();
         return redirect()->route('dashboard.slide.index')->with('status', "add Slide created successfully");
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
        $slide = Slide::find($id);
        $subcategories = SubCategory::all();
        return view('pages.slide.edit', compact('slide','subcategories'));
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
        $this->validate($request,[
            'title'=>'string|nullable',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=1920,height=650',
         ]);

         $slide = Slide::find($id);
         $slide->title = $request->title;

         if($request->file('image')){
            $pathImage = "images/slide/". basename($slide->image);
            if(File::extension($pathImage)){
                File::delete($pathImage);
            }

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/slide",$filename); //move to file
            $slide->image = url( 'images/slide'.'/'.$filename);
         }

         $slide->update();
         return redirect()->route('dashboard.slide.index')->with('status', "Slide updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);

        $pathImage = "images/slide/". basename($slide->image);
        if(File::extension($pathImage)){
            File::delete($pathImage);
        }
        $slide->delete();
        return redirect()->route('dashboard.slide.index')->with('status','Slide Deleted Successfully');
    }
}
