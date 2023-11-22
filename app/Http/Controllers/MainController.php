<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;
use App\Models\Slide;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Company;
use App\Models\Product;
use App\Models\Modeel;
use App\Models\Event;
use App\Models\Socialmedia;
use App\Models\Address;
use App\Models\Cover;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        return view('dashboard.index');
    }
    public function index()
    {
        $slides = Slide::all();

        return view("main.home", compact('slides'));
    }
    public function aboutUs()
    {
        $aboutus = AboutUs::first();
        $departments = Department::all();
        $social = Socialmedia::first();
        $events = Event::latest()->take(3)->get();
        $cover = Cover::first();

        return view("main.aboutUs", compact('aboutus','departments','social','events','cover'));
    }
    public function globalPartener()
    {
        $departments = Department::all();
        $companies = Company::all();
        $social = Socialmedia::first();
        $events = Event::latest()->take(3)->get();
        $cover = Cover::first();

        return view("main.globalPartener", compact('departments','companies','social','events','cover'));
    }
    public function eventNews()
    {
        $event = Event::first();
        //echo $event->eventDate;
        $timestamp = strtotime($event->eventDate);
        $mydate = date('Y-m-d', $timestamp);

        //$date = Carbon::createFromFormat('Y-m-d', $mydate);
        $month2 = $date->format('M');
        //echo $month2;



        $departments = Department::all();
        $social = Socialmedia::first();
        $events = Event::all();
        $cover = Cover::first();

        return view("main.eventNews", compact('departments','social','events','cover'));
    }
    public function contactUs()
    {
        $departments = Department::all();
        $social = Socialmedia::first();
        $events = Event::latest()->take(3)->get();
        $addresses = Address::all();
        $cover = Cover::first();

        return view("main.contactUs", compact('departments','social','events','addresses','cover'));
    }
    public function departmentShow($id) {
        //echo $product->imageproducts[0]->image;
        $department = Department::find($id);
        $departments = Department::all();
        //$companies = Company::where('department_id',$id)->get();
        $social = Socialmedia::first();
        $cover = Cover::first();
        $events = Event::latest()->take(3)->get();
        return view('main.departmentItem', compact('departments','department','social','events','cover'));
    }

    public function companyShow($id){
        $company = Company::find($id);
        $departments = Department::all();
        $social = Socialmedia::first();
        //$companies = Company::where('department_id',$id)->get();
        $events = Event::latest()->take(3)->get();

        return view('main.companyItem', compact('departments','company','social','events'));
    }

    public function productShow($id){
        $product = Product::find($id);
        $products = Product::all();
        $departments = Department::all();
        $social = Socialmedia::first();
        //$companies = Company::where('department_id',$id)->get();
        $events = Event::latest()->take(3)->get();

        return view('main.modeelItem', compact('departments','products','product','social','events'));
    }

    public function modeelShow($id){
        $modeel = Modeel::find($id);
        $modeels = Modeel::all();
        $departments = Department::all();
        $social = Socialmedia::first();
        //return "ok model detail";
        //$companies = Company::where('department_id',$id)->get();
        $events = Event::latest()->take(3)->get();

        return view('main.modeelDetails', compact('departments','modeels','modeel','social','events'));
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eventShow($id)
    {
        $event = Event::find($id);
        $departments = Department::all();
        $social = Socialmedia::first();
        $events = Event::all();
        $cover = Cover::first();

        //return "ok model detail";
        //$companies = Company::where('department_id',$id)->get();
        return view('main.eventDetails', compact('departments','events','event','social'));
    }
    public function categoryItem()
    {
        $departments = Department::all();
        $social = Socialmedia::first();

        return view("main.categoryItem",compact('departments','social'));
    }
    public function old()
    {
        $departments = Department::all();
        $social = Socialmedia::first();
        return view("home-old",compact('departments','social'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function productListAjax()
    {
        $products = Product::select('title')->get();
        $data = [];
        foreach($products as $item){
            $data[] = $item['title'];
        }
        return $data;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchProduct(Request $request)
    {

        $products = Product::all();
        $departments = Department::all();
        $companies = Company::all();
        $social = Socialmedia::first();
        $events = Event::latest()->take(3)->get();

        $searchProduct = $request->product_name;
        if($searchProduct != ''){

            $searchProducts  = Product::where('title','LIKE',"%$searchProduct%")->get();
            $searchCompanies  = Company::where('title','LIKE',"%$searchProduct%")->get();
            $searchModeels  = Modeel::where('title','LIKE',"%$searchProduct%")->get();

                if(count($searchProducts)>0){
                    $dataArray = [];
                    foreach($searchProducts as $searchProduct){
                                $modifiedData['id'] = $searchProduct->id;
                                $modifiedData['company_id'] = $searchProduct->company_id;
                                $modifiedData['title'] = $searchProduct->title;
                                $modifiedData['image'] = $searchProduct->image;

                                $dataArray[] = $modifiedData;

                    }
                    //return $dataArray[0]['title'];
                return view('main.searchProduct', compact('companies','products','departments','social','events','dataArray'));
                }elseif(count($searchCompanies)>0){
                    $dataArray = [];
                    foreach($searchCompanies as $searchCompany){
                        $modifiedData['id'] = $searchCompany->id;
                        $modifiedData['department_id'] = $searchCompany->department_id;
                        $modifiedData['title'] = $searchCompany->title;
                        $modifiedData['image'] = $searchCompany->image;

                        $dataArray[] = $modifiedData;
                    }
                    return view('main.searchCompany', compact('products','departments','social','events','dataArray'));

                }elseif(count($searchModeels)>0){
                    $dataArray = [];
                    foreach($searchModeels as $searchModeel){
                        $modifiedData['id'] = $searchModeel->id;
                        $modifiedData['product_id'] = $searchModeel->product_id;
                        $modifiedData['title'] = $searchModeel->title;
                        $modifiedData['description'] = $searchModeel->description;
                        $modifiedData['text'] = $searchModeel->text;
                        $modifiedData['linkVideo'] = $searchModeel->linkVideo;
                        $modifiedData['image'] = $searchModeel->image;
                        $modifiedData['filePDF'] = $searchModeel->filePDF;

                        $dataArray[] = $modifiedData;
                    }
                    return view('main.searchModeel', compact('products','departments','social','events','dataArray'));

                }else{
                    return redirect()->back();

            }
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
