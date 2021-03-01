<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

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
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required|unique:products,name',
            'code'          =>  'required|unique:products,code',
            'category_id'   =>  'required',
            'suplier_id'    =>  'required',
            'buying_price'  =>  'required',
            'selling_price' =>  'required',
            'buying_date'   =>  'required',
            'quantity'      =>  'required',
            'root'          =>  'required',
            'image'         =>  'required|max:10240000',
        ]);

        $product = new Product();
        if($request->image){

            $image      =   $request->image;
            $position   = strpos($image, ";");
            $subString  = substr($image, 0, $position);
            $extension  = explode("/", $subString)[1];
            $imgName    = "IMG_" . date("Ymd_his") . "." . $extension;
            $directory  = "admin/product/";
            $imageUrl   = $directory.$imgName;

            Image::make($image)->save($imageUrl);

            $product->name              =   $request->name;
            $product->code              =   $request->code;
            $product->category_id       =   $request->category_id;
            $product->suplier_id        =   $request->suplier_id;
            $product->buying_price      =   $request->buying_price;
            $product->selling_price     =   $request->selling_price;
            $product->buying_date       =   $request->buying_date;
            $product->quantity          =   $request->quantity;
            $product->root              =   $request->root;
            $product->slug              =   Str::slug($request->name, '-');;
            $product->image             =   $imageUrl;
            $product->save();
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
        $product    = Product::find($id);
        return response()->json($product);
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
        $request->validate([
            'name'          =>  "required|unique:products,name,$id",
            'code'          =>  "required|unique:products,code,$id",
            'category_id'   =>  'required',
            'suplier_id'    =>  'required',
            'buying_price'  =>  'required',
            'selling_price' =>  'required',
            'buying_date'   =>  'required',
            'quantity'      =>  'required',
            'root'          =>  'required',
            'image'         =>  'nullable|max:10240000',
        ]);

        $product = Product::find($id);

        if($request->new_image){
            if(file_exists($product->image)){
                unlink($product->image);
            }
            $image      =   $request->new_image;
            $position   = strpos($image, ";");
            $subString  = substr($image, 0, $position);
            $extension  = explode("/", $subString)[1];
            $imgName    = "IMG_" . date("Ymd_his") . "." . $extension;
            $directory  = "admin/product/";
            $imageUrl   = $directory.$imgName;

            Image::make($image)->save($imageUrl);
        }
        else{
            $imageUrl = $product->image;
        }

        $product->name              =   $request->name;
        $product->code              =   $request->code;
        $product->category_id       =   $request->category_id;
        $product->suplier_id        =   $request->suplier_id;
        $product->buying_price      =   $request->buying_price;
        $product->selling_price     =   $request->selling_price;
        $product->buying_date       =   $request->buying_date;
        $product->quantity          =   $request->quantity;
        $product->root              =   $request->root;
        $product->slug              =   Str::slug($request->name, '-');;
        $product->image             =   $imageUrl;
        $product->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image    = $product->image;
        if(file_exists($image)){
            unlink($image);
        }
        $product->delete($id);
    }
}
