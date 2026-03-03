<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:50',
            'password' => ['required', Password::min(8)->max(20)]
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/user_management');
        }
 
        return back()->withErrors(['error' => 'ไม่พบอีเมลล์ในระบบหรือกรอกรหัสผ่านผิดพลาด กรุณาตรวจสอบอีกครั้ง']);
    }



    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }



    public function forgot_password_check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50'
        ]);

        $check_email = User::where('email', $request->input('email'))->select('email', 'userID', 'forget_password_question', 'forget_password_hint')->first();

        if ($check_email) {
            return back()->with('reset_password_check_session', $check_email);
        } else {
            return back()->withErrors(['error' => 'ไม่พบอีเมลล์ในระบบ กรุณาตรวจสอบอีกครั้งหรือติดต่อแอดมิน'])->onlyInput('email');
        }
    }


    public function reset_password_check(Request $request, $id)
    {
        $credentials = $request->validate([
            'forget_password_answer' => 'required|string|max:100'
        ]);

        $check_answer = User::where('forget_password_answer', $credentials['forget_password_answer'])->where('userID', $id)->first();

        if ($check_answer) {
            return back()->with('reset_password_session', $check_answer);
        } else {
            return back()->withErrors(['error' => 'คำตอบไม่ถูกต้อง กรุณากรอกใหม่อีกครั้งหรือติดต่อแอดมิน']);
        }

    }

    
    public function reset_password_save(Request $request, $id)
    {
        $credentials = Validator::make($request->all(), [
            'password' => ['required', 'confirmed', Password::min(8)->max(20)]
        ]);

        if ($credentials->fails()) {
            return back()->withErrors(['error' => 'รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง']);
        } else {
            $user_password_save = User::findOrFail($id);
            $user_password_save->update(['password' => Hash::make($request->password)]);
            return redirect('/')->with('success', 'แก้ไขรหัสผ่านสำเร็จ ท่านสามารถเข้าสู่ระบบได้');
        }
    }
}