<title>Account | Your Application</title>

@extends('layouts.admin')

@section('account-content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-user icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>บัญชีของฉัน
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.</div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa fa-business-time fa-w-20"></i></span>
                            Buttons
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span> Inbox</span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span> Book</span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span> Picture</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span> File Disabled</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">ข้อมูลส่วนตัว</h5>
                        <form class="">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="email" class="form-label">อีเมลล์ (ใช้สำหรับเข้าสู่ระบบ) <span class="text-danger"> *</span></label>
                                        <input type="email" name="email" id="email" placeholder="..." class="form-control" maxlength="50" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="name" class="form-label">ชื่อ-สกุล <span class="text-danger"> *</span></label>
                                        <input type="text" name="name" id="name" placeholder="..." class="form-control" maxlength="50" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="position" class="form-label">ตำแหน่ง <span class="text-danger"> *</span></label>
                                        <select name="position" id="position" placeholder="..." class="form-control" required>
                                            <option value="" selected disabled>...</option>
                                            <option value="ตำแหน่ง 1">ตำแหน่ง 1</option>
                                            <option value="ตำแหน่ง 2">ตำแหน่ง 2</option>
                                            <option value="ตำแหน่ง 3">ตำแหน่ง 3</option>
                                            <option value="ตำแหน่ง 4">ตำแหน่ง 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <h5 class="card-title text-primary">การกู้คืนรหัสผ่าน</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="resetpassword_question" class="form-label">คำถาม</label>
                                        <input type="text" name="resetpassword_question" id="resetpassword_question" placeholder="..." class="form-control" maxlength="100">
                                        <small class="text-muted"><i>ระบบจะแสดงคำถามนี้ เมื่อท่านต้องการรีเซ็ตรหัสผ่าน</i></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="resetpassword_answer" class="form-label">คำตอบ</label>
                                        <input type="text" name="resetpassword_answer" id="resetpassword_answer" placeholder="..." class="form-control" maxlength="100">
                                        <small class="text-muted"><i>ท่านจะต้องกรอกให้ถูกต้องเมื่อรีเซ็ตรหัสผ่าน</i></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="resetpassword_hint" class="form-label">คำใบ้</label>
                                        <input type="text" name="resetpassword_hint" id="resetpassword_hint" placeholder="..." class="form-control" maxlength="100">
                                        <small class="text-muted"><i>ระบบจะแสดงคำใบ้สำหรับคำตอบของท่าน</i></small>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit_generalinfo" class="mt-2 btn btn-primary">บันทึก</button>
                        </form>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">เปลี่ยนรหัสผ่าน</h5>
                        <form class="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="password_current" class="form-label">รหัสผ่านปัจจุบัน <span class="text-danger"> *</span></label>
                                        <input type="password" name="password_current" id="password_current" placeholder="..." class="form-control" minlength="8" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="password_new" class="form-label">รหัสผ่านใหม่ <span class="text-danger"> *</span></label>
                                        <input type="password" name="password_new" id="password_new" placeholder="..." class="form-control" minlength="8" maxlength="20" required>
                                        <small class="text-muted"><i>รหัสผ่านความยาวไม่น้อยกว่า 8 ตัวอักษร และไม่เกิน 20 ตัวอักษร</i></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="password_confirm" class="form-label">ยืนยันรหัสผ่านใหม่ <span class="text-danger"> *</span></label>
                                        <input type="password" name="password_confirm" id="password_confirm" placeholder="..." class="form-control" minlength="8" maxlength="20" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit_newpassword" class="mt-2 btn btn-primary">บันทึก</button>
                        </form>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">แก้ไขรูปโปรไฟล์</h5>
                        <form action="" enctype="multipart/form-data">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="avatar">คลิก "Choose File" เพื่อเลือกไฟล์รูปภาพที่ต้องการ <span class="text-danger"> *</span></label>
                                        <input type="file" name="avatar" id="avatar" class="form-control-file" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="position-relative text-center">
                                        <img width="180" class="rounded-circle" src="{{ asset('images/my.webp') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit_avatar" class="mt-2 btn btn-primary">บันทึก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection