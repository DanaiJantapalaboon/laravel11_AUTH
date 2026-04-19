<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
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


    public function update_companyLogo_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['error' => 'รูปภาพไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง, นามสกุลไฟล์ที่แนะนำ .jpeg .jpg .png ขนาดไม่เกิน 2 MB']);
        }

        $company = Company::find(1);

        if ($company->logo && Storage::disk('public')->exists($company->logo)) {
            Storage::disk('public')->delete($company->logo);
        }

        $company->logo = $request->file('logo')->store('uploaded_img/logo', 'public');
        $company->save();

        return back();
    }
}
