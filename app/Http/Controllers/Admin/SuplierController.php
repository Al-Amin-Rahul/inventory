<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suplier;
use Intervention\Image\ImageManagerStatic as Image;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supliers = Suplier::all();
        return response()->json($supliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:supliers,email',
            'address' => 'required',
            'shop' => 'required',
            'image' => 'required|max:10240000',
        ]);

        if($request->image){

            $photo = $request->image;

            $position = strpos($photo, ";");
            $subString = substr($photo, 0, $position);
            $extension = explode("/", $subString)[1];
            $imgName = "IMG_" . date("Ymd_his") . "." . $extension;
            $imageUrl = "admin/suplier/".$imgName;

            $directory = 'admin/suplier/';
            if (!file_exists(public_path($directory))) {
                mkdir(public_path($directory), 777, true);
            }
            Image::make($photo)->save($imageUrl);

            $suplier   =   new Suplier();

            $suplier->name         =   $request->name;
            $suplier->phone        =   $request->phone;
            $suplier->email        =   $request->email;
            $suplier->address      =   $request->address;
            $suplier->shop         =   $request->shop;
            $suplier->image        =   $imageUrl;
            $suplier->save();
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
        $suplier = Suplier::find($id);
        return response()->json($suplier);
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
        $suplier = Suplier::find($id);
        $validator = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => "required|unique:supliers,email,$id",
            'address' => 'required',
            'shop' => 'required',
            'image' => 'nullable|max:10240000',
        ]);

        if($request->new_image){

            if(file_exists($suplier->image)){
                unlink($suplier->image);
            }
            $photo = $request->new_image;
            $position = strpos($photo, ";");
            $subString = substr($photo, 0, $position);
            $extension = explode("/", $subString)[1];
            $imgName = "IMG_" . date("Ymd_his") . "." . $extension;
            $imageUrl = "admin/suplier/".$imgName;

            $directory = 'admin/suplier/';
            if (!file_exists(public_path($directory))) {
                mkdir(public_path($directory), 777, true);
            }
            Image::make($photo)->save($imageUrl);
        }
        else{
            $imageUrl = $suplier->image;
        }

        $suplier->name         =   $request->name;
        $suplier->phone        =   $request->phone;
        $suplier->email        =   $request->email;
        $suplier->address      =   $request->address;
        $suplier->shop         =   $request->shop;
        $suplier->image        =   $imageUrl;
        $suplier->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suplier    =   Suplier::find($id);
        $image      =   $suplier->photo;
        if(file_exists($image)){
            unlink($image);
        }
        $suplier->delete($id);
    }
}
