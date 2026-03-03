<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rules\Password;

class UserManagementController extends Controller
{
    

    public function index() {
        $users = User::select('userID', 'name', 'position', 'email', 'created_at')->get();
        return view('admin.user_management', compact('users'));
    }


    public function user_add(Request $request): RedirectResponse
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email|max:50',
                'name' => 'required|string|max:50',
                'position' => 'required|string|max:50',
                'password' => ['nullable', 'confirmed', Password::min(8)->max(20)]
            ]);

            User::create($credentials);

        } catch(QueryException) {
            return back()->withErrors(['error' => 'อีเมลล์ซ้ำ กรุณากรอกใหม่']);
        }

        return back();
    }


    public function user_edit(string $id)
    {       
        $user_edit = User::withTrashed()->findOrFail($id);
        return view('admin.user_management_edit', compact('user_edit'));
    }

    
    public function user_edit_save(Request $request, $id): RedirectResponse
    {
        $credentials = $request->validate([
            'position' => 'required|string|max:50'
        ]);

       $user_edit_save = User::findOrFail($id);
       $user_edit_save->position = $credentials['position'];
       $user_edit_save->save();

       return back()->with('success', 'ปรับปรุงข้อมูลสำเร็จ');
    }


    public function user_disabled_save(Request $request, $id): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:50'
        ]);

        $user_disabled_save = User::where('email', $credentials['email'])->where('userID', $id)->first();

        if ($user_disabled_save) {
            $user_disabled_save->delete();
            return redirect()->route('user_management')->with('success', 'ผู้ใช้งานอีเมลล์ ' . $request->email . ' นี้ได้ปิดการใช้งานเรียบร้อยแล้ว');
        } else {
            return back()->withErrors(['error'=> 'ระงับบัญชีผู้ใช้ไม่สำเร็จ เนื่องจากกรอกอีเมลล์ผิด กรุณาตรวจสอบอีกครั้ง']);
        }
    }


}
