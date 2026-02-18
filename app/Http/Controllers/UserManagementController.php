<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rules\Password;

class UserManagementController extends Controller
{
    

    public function add_user(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|max:50',
                'name' => 'required|string|max:50',
                'position' => 'required|string|max:50',
                'password' => ['required', 'confirmed', Password::min(8)->max(20)]
            ]);

            User::create($validated);

        } catch(QueryException) {
            return back()->withErrors(['error' => 'อีเมลล์ซ้ำ กรุณากรอกใหม่']);
        }

        return back();
    }

    public function index() {
        $users = User::all();
        return view('admin.user_management', compact('users'));
    }
}




// use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\ValidationException;


// public function updatePassword(Request $request)
// {
//     // 1. Validate the form inputs (new password, confirmation, etc.)
//     $request->validate([
//         'current_password' => 'required',
//         'new_password' => 'required|min:8|confirmed',
//     ]);

//     // 2. Manually check if the 'current_password' input matches the stored password
//     if (!Hash::check($request->current_password, auth()->user()->password)) {
//         // If it doesn't match, manually add an error to the error bag
//         throw ValidationException::withMessages([
//             'current_password' => ['The current password field is incorrect.'],
//         ]);
//     }

//     // 3. If the current password is correct, update the password
//     $request->user()->update([
//         'password' => Hash::make($request->new_password),
//     ]);

//     // Redirect with success message
//     return back()->with('status', 'Password updated successfully!');
// }
