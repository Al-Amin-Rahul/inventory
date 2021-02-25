<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email',
            'address' => 'required',
            'salary' => 'required',
            'join_date' => 'required',
            'nid' => 'required',
            'image' => 'required',
        ]);

        if($request->image){

            $image      =   $request->image;
            $position   =   strpos($image, ';');
            $sub        =   substr($image,0,$position);
            $extension  =   explode('/',$sub)[1];
            $name       =   "IMG".'_'.time().'.'.$extension;
            $directory  =   "admin/employee";
            $imageUrl   =   $directory.'/'.$name;

            $employee   =   new Employee();

            $employee->name         =   $request->name;
            $employee->email        =   $request->email;
            $employee->address      =   $request->address;
            $employee->salary       =   $request->salary;
            $employee->join_date    =   $request->join_date;
            $employee->nid          =   $request->nid;
            $employee->image        =   $imageUrl;
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
