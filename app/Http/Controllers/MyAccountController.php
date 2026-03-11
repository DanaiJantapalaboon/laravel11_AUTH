<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class MyAccountController extends Controller
{


    public function change_info_save(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:50',
            'position' => 'required|string|max:50',
            'forget_password_hint' => 'required|string|max:100',
            'forget_password_answer' => 'required|string|max:100',
            'forget_password_question' => 'required|string|max:100'
        ]);

        $user = Auth::user();
        $user->name = $credentials['name'];
        $user->position = $credentials['position'];
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



    public function change_avatar_save(Request $request)    // เพิ่ม validator failure
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $user = Auth::user();

        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->avatar = $request->file('avatar')->store('uploaded_img/avatars', 'public');
        $user->save();

        return back();
    }

}

