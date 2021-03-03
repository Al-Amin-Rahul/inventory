<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee;
use App\Models\Product;

class SalaryController extends Controller
{
    public function storeSalary(Request $request){
        $request->validate([
            'salary' => 'required',
            'month' => 'required',
        ]);

        $salary =   new Salary();
        $salary->employee_id    =   $request->id;
        $salary->amount         =   $request->salary;
        $salary->month          =   $request->month;
        $salary->date           =   date('d');
        $salary->year           =   date('Y');
        $salary->save();

    }

    public function allSalary(){
        $salaries   =   Salary::select('month')->groupBy('month')->get();
        return response()->json($salaries);
    }

    public function viewSalary($id){
        $salary = Salary::with('employee')->where('month', $id)->get();
        return response()->json($salary);
    }
    public function updateStock(Request $request, $id){
        $request->validate([
            'quantity' => 'required'
        ]);

        $product = Product::find($id);
        $product->quantity = $request->quantity;
        $product->update();
    }
}
