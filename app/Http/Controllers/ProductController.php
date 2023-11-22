<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        return view('pages.product.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'subcategory_id'=>'required|numeric',
            'title'=>'required|string',
            'description'=>'nullable|string',
            'image1' => 'mimes:png,jpg',
            'image2' => 'mimes:png,jpg',
            'image3' => 'mimes:png,jpg',
            'image4' => 'mimes:png,jpg',
            'image5' => 'mimes:png,jpg',
            'capacity'=>'nullable|string',
            'unit'=>'nullable|string',
            'quantity'=>'nullable|numeric',
             'showIsHome' => 'nullable',
            'selectForYou' => 'nullable|boolean:0,1,true,false',

            'deliveryTime'=>'nullable|string',
            'sku'=>'nullable|string',
            'barcode'=>'nullable|string',
            'price'=>'nullable|numeric',
            'priceDiscount'=>'nullable|numeric',
         ]);


         //dd($request->all());
         $product = new Product;
         $product->subcategory_id= $request->subcategory_id;
         $product->title = $request->title;
         $product->description= $request->description;
         $product->showIsHome = $request->showIsHome== "1"? 1:0;
         $product->selectForYou = $request->selectForYou == "1" ? 1 : 0;
          //image 1
        if($request->file('image1')){
            $image1 = $request->file('image1');
            $filename = time().'_'.$image1->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image1->move("images/product",$filename); //move to file
            $product->image1 = url('images/product'.'/'.$filename);
        }
         // image 2
         if($request->file('image2')){
            $image2 = $request->file('image2');
            $filename2 = time().'_'.$image2->getClientOriginalName();
            $filename2 = str_replace(' ','-',$filename2);
            $image2->move("images/product",$filename2); //move to file
            $product->image2 = url('images/product'.'/'.$filename2);
         }
          // image 3
          if($request->file('image3')){
            $image3 = $request->file('image3');
            $filename3 = time().'_'.$image3->getClientOriginalName();
            $filename3 = str_replace(' ','-',$filename3);
            $image3->move("images/product",$filename3); //move to file
            $product->image3 = url('images/product'.'/'.$filename3);
         }
         // image 4
         if($request->file('image4')){
            $image4 = $request->file('image4');
            $filename4 = time().'_'.$image4->getClientOriginalName();
            $filename4 = str_replace(' ','-',$filename4);
            $image4->move("images/product",$filename4); //move to file
            $product->image4 = url('images/product'.'/'.$filename4);
         }
         // image 5
         if($request->file('image5')){
            $image5 = $request->file('image5');
            $filename5 = time().'_'.$image5->getClientOriginalName();
            $filename5 = str_replace(' ','-',$filename5);
            $image5->move("images/product",$filename5); //move to file
            $product->image5 = url('images/product'.'/'.$filename5);
         }
         $product->capacity= $request->capacity;
         $product->unit= $request->unit;
         $product->quantity= $request->quantity;
         $product->deliveryTime= $request->deliveryTime;
         $product->sku= $request->sku;
         $product->barcode= $request->barcode;
         $product->originCountry= $request->originCountry;
         $product->price= $request->price;
         $product->priceDiscount= $request->priceDiscount;
         //dd($request->all());
         if($request->colors){
            foreach($request->colors as $key=> $color){
                $product->productColor()->create([
                    'product_id'=>$product->id,
                    'color_id'=>$color,
                    'quantity'=>$request->colorQuantity[$key] ?? 0,
                ]);
            }
         }
          $product->save();
         return redirect()->route('dashboard.product.index')->with('status', "product created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $subcategories = SubCategory::all();
        $product = Product::find($id);
        return view('pages.product.edit',compact('subcategories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request,[

            'title' =>'required|string',
            'subcategory_id'=>'nullable|numeric',
            'image1' => 'mimes:png,PNG,jpg',
            'image2' => 'mimes:png,PNG,jpg',
            'image3' => 'mimes:png,PNG,jpg',
            'image4' => 'mimes:png,PNG,jpg',
            'image5' => 'mimes:png,PNG,jpg',
             'showIsHome' => 'nullable',
            'selectForYou' => 'nullable|boolean:0,1,true,false',
            'description'=>'nullable|string',
            'capacity'=>'nullable|string',
            'unit'=>'nullable|string',
            'quantity'=>'nullable|numeric',
            'deliveryTime'=>'nullable|string',
            'sku'=>'nullable|string',
            'barcode'=>'nullable|string',
            'price'=>'nullable|numeric',
            'priceDiscount'=>'nullable|numeric',

         ]);

         //dd($request->all());
         $product = Product::find($id);
         $product->subcategory_id= $request->subcategory_id;
         $product->title = $request->title;
         $product->description= $request->description;

         $product->showIsHome = $request->showIsHome== "1"? 1:0;
         $product->selectForYou = $request->selectForYou == "1" ? 1 : 0;

         if($request->file('image1')){
            $pathImage = "images/product/". basename($product->image1);
            if(File::extension($pathImage)){
                File::delete($pathImage);
            }

            $image1 = $request->file('image1');
            $filename = time().'_'.$image1->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image1->move("images/product",$filename); //move to file
            $product->image1 = url( 'images/product'.'/'.$filename);
         }

         if($request->file('image2')){
            $pathImage = "images/product/". basename($product->image2);
            if(File::extension($pathImage)){
                File::delete($pathImage);
            }

            $image2 = $request->file('image2');
            $filename = time().'_'.$image2->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image2->move("images/product",$filename); //move to file
            $product->image2 = url( 'images/product'.'/'.$filename);
         }

         if($request->file('image3')){
            $pathImage = "images/product/". basename($product->image3);
            if(File::extension($pathImage)){
                File::delete($pathImage);
            }

            $image3 = $request->file('image3');
            $filename = time().'_'.$image3->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image3->move("images/product",$filename); //move to file
            $product->image3 = url( 'images/product'.'/'.$filename);
         }

         if($request->file('image4')){
            $pathImage = "images/product/". basename($product->image4);
            if(File::extension($pathImage)){
                File::delete($pathImage);
            }

            $image4 = $request->file('image4');
            $filename = time().'_'.$image4->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image4->move("images/product",$filename); //move to file
            $product->image4 = url( 'images/product'.'/'.$filename);
         }

         if($request->file('image5')){
            $pathImage = "images/product/". basename($product->image5);
            if(File::extension($pathImage)){
                File::delete($pathImage);
            }

            $image5 = $request->file('image5');
            $filename = time().'_'.$image5->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image5->move("images/product",$filename); //move to file
            $product->image5 = url( 'images/product'.'/'.$filename);
         }

         $product->capacity= $request->capacity;
         $product->unit= $request->unit;
         $product->quantity= $request->quantity;
         $product->deliveryTime= $request->deliveryTime;
         $product->sku= $request->sku;
         $product->barcode= $request->barcode;
         $product->originCountry= $request->originCountry;
         $product->price= $request->price;
         $product->priceDiscount= $request->priceDiscount;
         $product->update();
        return redirect()->route('dashboard.product.index')->with('status', "product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $product = Product::find($id);

        $pathImage1 = "images/product/". basename($product->image1);
        if(File::extension($pathImage1)){
            File::delete($pathImage1);
        }

        $pathImage2 = "images/product/". basename($product->image2);
        if(File::extension($pathImage2)){
            File::delete($pathImage2);
        }

        $pathImage3 = "images/product/". basename($product->image3);
        if(File::extension($pathImage3)){
            File::delete($pathImage3);
        }

        $pathImage4 = "images/product/". basename($product->image4);
        if(File::extension($pathImage4)){
            File::delete($pathImage4);
        }

        $pathImage5 = "images/product/". basename($product->image5);
        if(File::extension($pathImage5)){
            File::delete($pathImage5);
        }

        $product->delete();
        return redirect()->route('dashboard.product.index')->with('status','Product Deleted Successfully');
    }
}
