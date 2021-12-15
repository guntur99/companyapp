<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->now = Carbon::now('Asia/Jakarta');
    }

    public function index(){

        $companies = Company::get();

        return view('layouts.dashboard.menus.employees.create', [
            'companies' => $companies
        ]);
    }

    public function create(){

        $employee               = new Employee;
        $employee->first_name   = request()->first_name;
        $employee->last_name    = request()->last_name;
        $employee->company      = request()->company;
        $employee->email        = request()->email;
        $employee->phone        = request()->phone;
        $employee->save();

        return back()->with('status', 200);

    }

    public function list(){

        return view('layouts.dashboard.menus.employees.list');
    }

    public function employeeListDatatable(){

        return datatables()->of(Employee::query())->toJson();

    }
}
