<title>Testings | {{ $company_info->name }}</title>

@extends('layouts.admin')

@section('admin-content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-user icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>แก้ไขรายการทดสอบ - {{ $testing_edit->name }}
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.</div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="{{ route('testing') }}" class="btn btn-dark px-3"><i class="lnr-chevron-left"></i> Back</a>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                @session('success')
                    <p class="alert alert-success">{{ $value }}</p>
                @endsession
                @error('error')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">เพิ่มรายการทดสอบ</h5>
                        <form action="{{ route('test_edit.submit', $testing_edit->testingID) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="name" class="form-label">ชื่อรายการทดสอบ <span class="text-danger"> *</span></label>
                                        <input type="name" name="name" id="name" placeholder="..." value="{{ $testing_edit->name }}" class="form-control @error('error') is-invalid @enderror" maxlength="100" required>
                                        @error('error')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="testtypeID" class="form-label">วิธีทดสอบ/เทคนิค <span class="text-danger"> *</span></label>
                                        <select name="testtypeID" id="testtypeID" placeholder="..." class="form-control" required>
                                            <option value="{{ $testing_edit->testtypeID }}" selected>{{ $testing_edit->test_type->name }}</option>
                                            @php
                                                $testtypes = DB::table('settings_test_type')->select('testtypeID', 'name')->get();
                                            @endphp
                                            @foreach ($testtypes as $testtype)
                                                <option value="{{ $testtype->testtypeID }}">{{ $testtype->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <input type="hidden" name="updated_by" value="{{ Auth::user()->userID }}" readonly required>
                                        <label for="updated_by" class="form-label">ผู้แก้ไขข้อมูล</label>
                                        <input type="text" id="updated_by" class="form-control" value="{{ Auth::user()->name }}" readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="position-relative">
                                        <label for="description" class="form-label">คำอธิบาย (จะแสดงเป็น tooltips หน้าเว็บไซต์เมื่อเอาเม้าส์ไปวาง) <span class="text-danger"> *</span></label>
                                        <input type="text" name="description" id="description" placeholder="..." value="{{ $testing_edit->description }}" class="form-control" maxlength="255" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="icon">คลิก "Choose File" เพื่อเลือกไฟล์รูปภาพไอคอนที่ต้องการ</label>
                                        <input type="file" name="icon" id="icon" class="form-control-file" accept=".png, .jpg, .jpeg, .svg, .webp">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        @if (!is_null($testing_edit->icon))
                                            <img width="70" src="{{ asset($testing_edit->icon) }}" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary">บันทึก</button>
                        </form>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">ผู้ใช้งานทั้งหมด</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection