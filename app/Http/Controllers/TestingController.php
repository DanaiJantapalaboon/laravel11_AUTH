<?php

namespace App\Http\Controllers;

use App\Models\Testing;
use Illuminate\Http\Request;
use App\Models\Settings_test_type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;

class TestingController extends Controller
{
    public function index() {
        $testings = Testing::select('testingID', 'name', 'document', 'testtypeID', 'icon', 'deleted_at')->withTrashed()->get();
        $testtypes = Settings_test_type::select('testtypeID', 'name')->get();
        return view('admin.testing', compact('testings', 'testtypes'));
    }

    public function testing_edit(string $id)
    {
        $testing_edit = Testing::withTrashed()->findOrFail($id);
        return view('admin.testing_edit', compact('testing_edit'));
    }

    public function add_testing(Request $request): RedirectResponse
    {
        try {
            $credentials = $request->validate([
                'name' => 'required|string|max:100',
                'testtypeID' => 'required|integer',
                'updated_by' => 'required|integer',
                'description' => 'required|string|max:255',
                'icon' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
                'document' => 'nullable|file|mimes:pdf,docx'
            ]);

            if ($request->hasFile('icon')) {
                $file_icon = time() . '_' . $request->file('icon')->getClientOriginalName();
                $request->file('icon')->move(
                    public_path('uploads/uploaded_img'),
                    $file_icon
                );
                $credentials['icon'] = 'uploads/uploaded_img/' . $file_icon;
            }

            if ($request->hasFile('document')) {
                $file_document = time() . '_' . $request->file('document')->getClientOriginalName();
                $request->file('document')->move(
                    public_path('uploads/uploaded_file'),
                    $file_document
                );
                $credentials['document'] = 'uploads/uploaded_file/' . $file_document;
            }

            Testing::create($credentials);

        } catch(QueryException) {
            return back()->withErrors(['error' => 'ชื่อรายการทดสอบซ้ำ กรุณากรอกใหม่']);
        }
        return back();
    }



    public function test_edit_save(Request $request, $id): RedirectResponse
    {
        try {
            $credentials = $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'required|string|max:255',
                'testtypeID' => 'required|integer',
                'updated_by' => 'required|integer'
            ]);

            $edit_testing = Testing::findOrFail($id);
            $edit_testing->name = $credentials['name'];
            $edit_testing->description = $credentials['description'];
            $edit_testing->testtypeID = $credentials['testtypeID'];
            $edit_testing->updated_by = $credentials['updated_by'];
            $edit_testing->save();

        } catch(QueryException) {
            return back()->withErrors(['error' => 'รายการทดสอบซ้ำ กรุณากรอกใหม่']);
        }

       return back()->with('success', 'ปรับปรุงข้อมูลสำเร็จ');
    }



    public function delete_testing_save(Request $request, $id): RedirectResponse
    {
        $credentials = $request->validate([
            'userID' => 'required|integer'
        ]);

        $testing = Testing::findOrFail($id);
        if ($testing->icon) {
            $oldFile = public_path($testing->icon);

            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }
        if ($testing->document) {
            $oldFile = public_path($testing->document);

            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        Testing::where('testingID', $id)->update(['updated_by' => $credentials['userID']]);
        Testing::where('testingID', $id)->delete();
        return back();
    }
}
