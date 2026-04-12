<title>Company | Your Application</title>

@extends('layouts.admin')

@section('company-content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-user icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>ข้อมูลร้านค้า
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">ข้อมูลทั่วไป</h5>
                        <form action="update_companyInfo.submit" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <div class="position-relative">
                                        <label for="name" class="form-label">ชื่อร้าน<span class="text-danger"> *</span></label>
                                        <input type="text" name="name" id="name" placeholder="..." class="form-control" maxlength="100" value="{{ $company_info->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="tax" class="form-label">เลขประจำตัวผู้เสียภาษี 13 หลัก</label>
                                        <input type="text" name="tax" id="tax" placeholder="..." class="form-control" maxlength="13" value="{{ $company_info->tax }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <div class="position-relative">
                                        <label for="address" class="form-label">ที่อยู่</label>
                                        <input type="text" name="address" id="address" placeholder="..." class="form-control" maxlength="200" value="{{ $company_info->address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="email" class="form-label">อีเมลล์</label>
                                        <input type="email" name="email" id="email" placeholder="..." class="form-control" maxlength="50" value="{{ $company_info->email }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="tel1" class="form-label">เบอร์โทรศัพท์ 1</label>
                                        <input type="tel" name="tel1" id="tel1" placeholder="..." class="form-control" maxlength="20" value="{{ $company_info->tel1 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="tel2" class="form-label">เบอร์โทรศัพท์ 2</label>
                                        <input type="tel" name="tel2" id="tel2" placeholder="..." class="form-control" maxlength="20" value="{{ $company_info->tel2 }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary">บันทึก</button>
                        </form>
                    </div>
                </div>

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">แก้ไขรูปโลโก้</h5>
                        <form action="" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="avatar">คลิก "Choose File" เพื่อเลือกไฟล์รูปภาพที่ต้องการ <span class="text-danger"> *</span></label>
                                        <input type="file" name="avatar" id="avatar" class="form-control-file" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="position-relative">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary">บันทึก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection