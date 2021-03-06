<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->now = Carbon::now('Asia/Jakarta');
    }

    public function index(){

        return view('layouts.dashboard.menus.companies.create');
    }

    public function create(){

        // $validate = request()->validate([
        //     'name' => 'required',
        //     'email' => 'unique:companies',
        // ]);

        $company            = new Company;
        $company->name      = request()->name;
        $company->email     = request()->email;
        $company->website   = request()->website;

        if (request()->hasFile('logo')) {

            $fileName       = time().'_'.request()->logo->getClientOriginalName();
            $filePath       = request()->logo->storeAs('logos', $fileName, 'public');
            $company->logo  = $fileName;
        }

        $company->save();

        return redirect()->route('list.company');

    }

    public function list(){

        return view('layouts.dashboard.menus.companies.list');
    }

    public function companyListDatatable(){

        return datatables()->of(Company::query())->toJson();

    }

    public function update(){

        $employee           = Company::find((int)request()->company_id);
        $employee->name     = request()->name;
        $employee->email    = request()->email;
        $employee->website  = request()->website;
        $employee->save();

        return response('Update Success', 200);
    }

    public function delete(){

        Company::find(request()->company_id)->delete();

        return response('Delete Success', 200);
    }
}
