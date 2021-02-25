<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees  =   Employee::all();
        return response()->json($employees);
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
            'email' => 'required|unique:employees,email',
            'address' => 'required',
            'salary' => 'required',
            'join_date' => 'required',
            'nid' => 'required',
            'image' => 'required',
        ]);

        if($request->image){

            $photo = $request->image;

            $position = strpos($photo, ";");
            $subString = substr($photo, 0, $position);
            $extension = explode("/", $subString)[1];

            $imgName = "IMG_" . date("Ymd_his") . "." . $extension;
            $directory = "admin/employee/".$imgName;

            Image::make($photo)->save($directory);

            
            // return $imageUrl;

            $employee   =   new Employee();

            $employee->name         =   $request->name;
            $employee->email        =   $request->email;
            $employee->address      =   $request->address;
            $employee->salary       =   $request->salary;
            $employee->join_date    =   $request->join_date;
            $employee->nid          =   $request->nid;
            $employee->image        =   $directory;
            $employee->save();
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
