<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    //

    public function index ()
    {
        $employee = DB::table('employees')
        ->join('salaries','employees.emp_no', '=','salaries.emp_no')
        ->selectRaw('employees.emp_no,employees.first_name, sum(salaries.salary) as sum')
        ->groupBy('employees.emp_no')
        ->orderBy('sum', 'DESC')->first();

        return response()->json($employee);
    }
}