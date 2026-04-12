<title>User Management | {{ $company_info->name }}</title>

@extends('layouts.admin')

@section('user_management-content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-user icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>จัดการบัญชีผู้ใช้ทั้งหมด
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                @session('success')
                    <p class="alert alert-success">{{ $value }}</p>
                @endsession
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">ข้อมูลส่วนตัว</h5>
                        <form action="add_account.submit" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="email" class="form-label">อีเมลล์ (ใช้สำหรับเข้าสู่ระบบ) <span class="text-danger"> *</span></label>
                                        <input type="email" name="email" id="email" placeholder="..." class="form-control @error('error') is-invalid @enderror" maxlength="50" required>
                                        @error('error')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                            <option selected disabled>...</option>
                                            <option value="1">ตำแหน่ง 1</option>
                                            <option value="2">ตำแหน่ง 2</option>
                                            <option value="3">ตำแหน่ง 3</option>
                                            <option value="4">ตำแหน่ง 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="password" class="form-label">รหัสผ่าน</label>
                                        <input type="password" name="password" id="password" placeholder="..." class="form-control" minlength="8" maxlength="20">
                                        <small class="text-muted"><i>รหัสผ่านความยาวไม่น้อยกว่า 8 ตัวอักษร และไม่เกิน 20 ตัวอักษร</i></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="password_confirmation" class="form-label">ยืนยันรหัสผ่าน</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="..." class="form-control @error('password') is-invalid @enderror" minlength="8" maxlength="20">
                                        @error('password')
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
                        <h5 class="card-title text-primary">ผู้ใช้งานทั้งหมด</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="position-relative">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover css-serial display compact" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th class="dt-center" scope="col">#</th>
                                                    <th scope="col">ชื่อ-สกุล</th>
                                                    <th scope="col">ตำแหน่ง</th>
                                                    <th scope="col">อีเมลล์</th>
                                                    <th class="dt-center" scope="col">วันที่สร้าง Account</th>
                                                    <th class="dt-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                @foreach ($users as $user)
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->position }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td class="dt-center">{{ $user->created_at }}</td>
                                                    <td class="dt-center"><a href="{{ route('user_management_edit', $user->userID) }}" class="btn btn-sm btn-secondary">แก้ไข</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection