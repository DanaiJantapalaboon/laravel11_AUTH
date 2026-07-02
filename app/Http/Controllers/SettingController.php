<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings_position;
use App\Models\Settings_book_type;
use App\Models\Settings_test_type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;

class SettingController extends Controller
{
    public function index() {
        $setting_positions = Settings_position::select('positionID', 'name')->get();
        $setting_book_type = Settings_book_type::select('booktypeID', 'name')->get();
        $setting_test_type = Settings_test_type::select('testtypeID', 'name')->get();
        return view('admin.setting', compact('setting_positions', 'setting_book_type', 'setting_test_type'));
    }
    
    public function add_position(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:100',
            'updated_by' => 'required|integer'
        ]);

        Settings_position::create($credentials);
        return back();
    }

    public function edit_position_save(Request $request, $id): RedirectResponse
    {
        $credentials = $request->validate([
            'edit_name' => 'required|string|max:100',
            'userID' => 'required|integer'
        ]);

       $edit_position_save = Settings_position::findOrFail($id);
       $edit_position_save->name = $credentials['edit_name'];
       $edit_position_save->updated_by = $credentials['userID'];
       $edit_position_save->save();

       return back()->with('success', 'ปรับปรุงข้อมูลสำเร็จ');
    }

    public function delete_position_save(Request $request, $id): RedirectResponse
    {
        $credentials = $request->validate([
            'userID' => 'required|integer'
        ]);

        Settings_position::where('positionID', $id)->update(['updated_by' => $credentials['userID']]);
        Settings_position::where('positionID', $id)->delete();
        return back();
    }




    public function add_book_type(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:50',
            'updated_by' => 'required|integer'
        ]);

        Settings_book_type::create($credentials);
        return back();
    }

    public function edit_booktype_save(Request $request, $id): RedirectResponse
    {
        $credentials = $request->validate([
            'edit_name' => 'required|string|max:100',
            'userID' => 'required|integer'
        ]);

       $edit_booktype_save = Settings_book_type::findOrFail($id);
       $edit_booktype_save->name = $credentials['edit_name'];
       $edit_booktype_save->updated_by = $credentials['userID'];
       $edit_booktype_save->save();

       return back()->with('success', 'ปรับปรุงข้อมูลสำเร็จ');
    }

    public function delete_booktype_save(Request $request, $id): RedirectResponse
    {
        $credentials = $request->validate([
            'userID' => 'required|integer'
        ]);

        Settings_book_type::where('booktypeID', $id)->update(['updated_by' => $credentials['userID']]);
        Settings_book_type::where('booktypeID', $id)->delete();
        return back();
    }

    
    public function add_test_type(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:50',
            'updated_by' => 'required|integer'
        ]);

        Settings_test_type::create($credentials);
        return back();
    }

    public function edit_testtype_save(Request $request, $id): RedirectResponse
    {
        $credentials = $request->validate([
            'edit_name' => 'required|string|max:50',
            'userID' => 'required|integer'
        ]);

       $edit_testtype_save = Settings_test_type::findOrFail($id);
       $edit_testtype_save->name = $credentials['edit_name'];
       $edit_testtype_save->updated_by = $credentials['userID'];
       $edit_testtype_save->save();

       return back()->with('success', 'ปรับปรุงข้อมูลสำเร็จ');
    }

    public function delete_testtype_save(Request $request, $id): RedirectResponse
    {
        $credentials = $request->validate([
            'userID' => 'required|integer'
        ]);

        Settings_test_type::where('testtypeID', $id)->update(['updated_by' => $credentials['userID']]);
        Settings_test_type::where('testtypeID', $id)->delete();
        return back();
    }
}