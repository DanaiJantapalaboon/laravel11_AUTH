<title>Account | {{ $company_info->name }}</title>

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
                @session('success')
                    <p class="alert alert-success">{{ $value }}</p>
                @endsession
                @error('error')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">ข้อมูลส่วนตัว</h5>
                        <form action="change_info.submit" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="email" class="form-label">อีเมลล์ (ใช้สำหรับเข้าสู่ระบบ)</label>
                                        <input type="email" id="email" placeholder="..." class="form-control" maxlength="50" value="{{ Auth::user()->email }}" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="name" class="form-label">ชื่อ-สกุล <span class="text-danger"> *</span></label>
                                        <input type="text" name="name" id="name" placeholder="..." class="form-control" maxlength="50" value="{{ Auth::user()->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="position" class="form-label">ตำแหน่ง <span class="text-danger"> *</span></label>
                                        <select name="position" id="position" placeholder="..." class="form-control" required>
                                            <option value="{{ Auth::user()->position }}" selected>{{ Auth::user()->position }}</option>
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
                                        <label for="forget_password_question" class="form-label">คำถาม<span class="text-danger"> *</span></label>
                                        <input type="text" name="forget_password_question" id="forget_password_question" placeholder="..." value="{{ Auth::user()->forget_password_question }}" class="form-control" maxlength="100" required>
                                        <small class="text-muted"><i>ระบบจะแสดงคำถามนี้ เมื่อท่านต้องการรีเซ็ตรหัสผ่าน</i></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="forget_password_answer" class="form-label">คำตอบ<span class="text-danger"> *</span></label>
                                        <input type="text" name="forget_password_answer" id="forget_password_answer" placeholder="..." value="{{ Auth::user()->forget_password_answer }}" class="form-control" maxlength="100" required>
                                        <small class="text-muted"><i>ท่านจะต้องกรอกให้ถูกต้องเมื่อรีเซ็ตรหัสผ่าน</i></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="forget_password_hint" class="form-label">คำใบ้<span class="text-danger"> *</span></label>
                                        <input type="text" name="forget_password_hint" id="forget_password_hint" placeholder="..." value="{{ Auth::user()->forget_password_hint }}" class="form-control" maxlength="100" required>
                                        <small class="text-muted"><i>ระบบจะแสดงคำใบ้สำหรับคำตอบของท่าน</i></small>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary">บันทึก</button>
                            <button type="button" class="mt-2 btn btn-warning" onclick="openModal()">แก้ไขอีเมลล์</button>
                        </form>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">เปลี่ยนรหัสผ่าน</h5>
                        <form action="change_password.submit" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="current_password" class="form-label">รหัสผ่านปัจจุบัน <span class="text-danger"> *</span></label>
                                        <input type="password" name="current_password" id="current_password" placeholder="..." class="form-control @error('current_password') is-invalid @enderror" minlength="8" maxlength="20" required>
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="password" class="form-label">รหัสผ่านใหม่ <span class="text-danger"> *</span></label>
                                        <input type="password" name="password" id="password" placeholder="..." class="form-control" minlength="8" maxlength="20" required>
                                        <small class="text-muted"><i>รหัสผ่านความยาวไม่น้อยกว่า 8 ตัวอักษร และไม่เกิน 20 ตัวอักษร</i></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="password_confirmation" class="form-label">ยืนยันรหัสผ่านใหม่ <span class="text-danger"> *</span></label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="..." class="form-control @error('confirm_password') is-invalid @enderror" minlength="8" maxlength="20" required>
                                        @error('confirm_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary">บันทึก</button>
                        </form>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">แก้ไขรูปโปรไฟล์</h5>
                        <form action="change_avatar.submit" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="avatar">คลิก "Choose File" เพื่อเลือกไฟล์รูปภาพที่ต้องการ <span class="text-danger"> *</span></label>
                                        <input type="file" name="avatar" id="avatar" class="form-control-file" accept=".png, .jpg, .jpeg" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="position-relative text-center">
                                        <img width="180" class="rounded-circle" src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="">
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
    <div class="pure-modal" id="emailModal">
        <div class="pure-modal-dialog">
            <div class="pure-modal-header d-flex justify-content-between align-items-center bg-warning">
                <h5 class="pure-modal-title">แก้ไขอีเมลล์</h5>
                <button class="pure-modal-close" onclick="closeModal('emailModal')">&times;</button>
            </div>
            <form action="change_email.submit" method="POST">
                @csrf
                @method('PATCH')
                <div class="pure-modal-body">
                    <label for="email_old" class="form-label">อีเมลล์เดิม</label>
                    <input type="email" id="email_old" value="{{ Auth::user()->email }}" class="form-control mb-3" readonly disabled>
                    <label for="email" class="form-label">อีเมลล์ใหม่ (ใช้สำหรับเข้าสู่ระบบ) <span class="text-danger"> *</span></label>
                    <input type="email" name="email" id="email" placeholder="..." class="form-control" maxlength="50" required>
                </div>
                <div class="pure-modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModal('emailModal')">ยกเลิก</button>
                    <button type="submit" class="btn btn-warning">แก้ไขอีเมลล์</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    function openModal() {
        document.getElementById('emailModal').classList.add('active');
    }
    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
    }
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.pure-modal.active')
                .forEach(modal => modal.classList.remove('active'));
        }
    });
</script>