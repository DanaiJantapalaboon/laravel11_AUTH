<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Settings_position;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class MyAccountController extends Controller
{

    public function index() {
        $positions = Settings_position::select('positionID', 'name')->get();
        return view('admin.account', compact('positions'));
    }

    public function change_info_save(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:50',
            'positionID' => 'required|integer',
            'forget_password_hint' => 'required|string|max:100',
            'forget_password_answer' => 'required|string|max:100',
            'forget_password_question' => 'required|string|max:100'
        ]);

        $user = Auth::user();
        $user->name = $credentials['name'];
        $user->positionID = $credentials['positionID'];
        $user->forget_password_hint = $credentials['forget_password_hint'];
        $user->forget_password_answer = $credentials['forget_password_answer'];
        $user->forget_password_question = $credentials['forget_password_question'];
        $user->save();

        return back()->with('success', 'แก้ไขข้อมูลผู้ใช้สำเร็จแล้ว');
    }
    


    public function change_password_save(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', Password::min(8)->max(20)],
            'password' => ['required', 'confirmed', 'different:current_password', Password::min(8)->max(20)],
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['confirm_password' => 'ยืนยันรหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง']);
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'รหัสผ่านปัจจุบันไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'เปลี่ยนรหัสผ่านสำเร็จแล้ว');
    }



    public function change_email_save(Request $request): RedirectResponse
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email|max:50',
            ]);

            $user = Auth::user();
            $user->email = $credentials['email'];
            $user->save();

        } catch(QueryException) {
            return back()->withErrors(['error' => 'อีเมลล์ซ้ำ กรุณากรอกใหม่']);
        }

        return back()->with('success', 'เปลี่ยนอีเมลล์สำเร็จแล้ว');
    }



    public function change_avatar_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['error' => 'รูปภาพไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง, นามสกุลไฟล์ที่แนะนำ .jpeg .jpg .png ขนาดไม่เกิน 2 MB']);
        }

        $user = Auth::user();

        if ($user->avatar) {
            $oldFile = public_path($user->avatar);

            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $file_avatar = time() . '_' . $request->file('avatar')->getClientOriginalName();         // Create unique filename
        
        $request->file('avatar')->move(                               // Move uploaded file
            public_path('uploads/uploaded_img'),
            $file_avatar
        );

        $user->avatar = 'uploads/uploaded_img/' . $file_avatar;
        $user->save();

        return back();
    }

}

