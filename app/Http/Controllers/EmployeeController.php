<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Company;
use App\Models\Employee;
use App\Notifications\NewEmployee;
use Illuminate\Support\Facades\Notification;

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

        $employeeData = [
            'body'          => 'You recieved new notification',
            'employeeText'  => 'See Detail',
            'url'           => url('/'),
            'thanks'        => 'Thank you!!!',
        ];

        Notification::send($employee, new NewEmployee($employeeData));

        return redirect()->route('list.employee');

    }

    public function list(){
        $employees  = Employee::select('first_name', 'last_name', 'email', 'created_at')->get();
        $companies  = Company::select('id', 'name')->get();

        return view('layouts.dashboard.menus.employees.list', [
            'employees' => $employees,
            'companies' => $companies,
        ]);

    }

    public function employeeListDatatable(){
        $email      = request()->email;
        $company    = request()->company;
        $first_name = request()->first_name;
        $last_name  = request()->last_name;

        $employees = Employee::join('companies', 'employees.company', '=', 'companies.id')
                        ->select(array('employees.*', 'companies.name as company_name'))
                        ->orWhere(function($query) use($email, $company, $first_name, $last_name) {
                            if($email != null){
                                $query->where('employees.email', $email);
                            }
                            if($company != null){
                                $query->where('employees.company', $company);
                            }
                            if ($first_name != null){
                                $query->where('employees.first_name', $first_name);
                            }
                            if($last_name != null){
                                $query->where('employees.last_name', $last_name);
                            }
                        })
                        ->get();

        return datatables()->of($employees)->toJson();

    }

    public function update(){
        $employee               = Employee::find((int)request()->employee_id);
        $employee->first_name   = request()->first_name;
        $employee->last_name    = request()->last_name;
        $employee->email        = request()->email;
        $employee->phone        = request()->phone;
        $employee->save();

        return response('Update Success', 200);
    }

    public function delete(){

        Employee::find(request()->employee_id)->delete();

        return response('Delete Success', 200);
    }

}
