<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{


    public function forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50'
        ]);

        $check_email = User::where('email', $request->input('email'))->first();
        if ($check_email) {
            return back()->with('reset_password_session', $check_email);
        } else {
            return back()->withErrors(['error' => 'ไม่พบอีเมลล์ในระบบ กรุณาตรวจสอบอีกครั้งหรือติดต่อแอดมิน']);
        }
    }


    public function reset_password_save(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'confirmed', Password::min(8)->max(20)],
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['error' => 'รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง']);
        } else {
            $user_password_save = User::findOrFail($id);
            $user_password_save->update(['password' => Hash::make($request->password)]);
            return redirect('/')->with('success', 'แก้ไขรหัสผ่านสำเร็จ ท่านสามารถเข้าสู่ระบบได้');
        }
    }
}