<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MyAccountController extends Controller
{
    



    
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([

        ]);

        return redirect('/account');
    }

}





// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

// public function verifyCurrentPassword(Request $request)
// {
//     if (Hash::check($request->current_password, auth()->user()->password)) {
//         // Password is correct
//         // ... proceed with sensitive action
//     } else {
//         // Password is incorrect
//         return back()->withErrors(['current_password' => 'Your current password is incorrect.']);
//     }
// }



// In a file like App/Http/Requests/UpdateProfileRequest.php

// use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Hash;

// class UpdateProfileRequest extends FormRequest
// {
//     // ... authorize() method ...

//     public function rules()
//     {
//         return [
//             // Other rules...
//             'current_password' => 'required',
//         ];
//     }

//     public function withValidator($validator)
//     {
//         $validator->after(function ($validator) {
//             if (!Hash::check($this->current_password, $this->user()->password)) {
//                 $validator->errors()->add('current_password', 'Your current password is incorrect.');
//             }
//         });
//     }
// }

