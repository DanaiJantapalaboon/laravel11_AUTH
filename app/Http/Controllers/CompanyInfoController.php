<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyInfoController extends Controller
{


    public function update_companyInfo_save(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:100',
            'name2' => 'required|string|max:100',
            'tax' => 'nullable|string|max:13',
            'address' => 'nullable|string|max:200',
            'email' => 'nullable|email|max:50',
            'tel1' => 'nullable|string|max:20',
            'tel2' => 'nullable|string|max:20'
        ]);

        $company = Company::find(1);
        $company->name = $credentials['name'];
        $company->name2 = $credentials['name2'];
        $company->tax = $credentials['tax'];
        $company->address = $credentials['address'];
        $company->email = $credentials['email'];
        $company->tel1 = $credentials['tel1'];
        $company->tel2 = $credentials['tel2'];
        $company->save();

        return back();
    }
}
