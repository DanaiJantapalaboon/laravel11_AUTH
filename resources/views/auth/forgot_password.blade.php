<title>ลืมรหัสผ่าน | Your Application</title>

@extends('layouts.auth')

@section('main-content')
    <div class="col-sm-6">
        <form action="forgot_password.check" method="POST">
            @csrf
            <h2 class="text-center fw-semibold">ลืมรหัสผ่าน</h2>
            <h6 class="text-center">โปรแกรม่าสฟห่ดสาฟหก่ดวสา</h6>
            <hr class="mb-5">
            <div class="d-flex justify-content-between">
                <label for="email" class="form-label">กรุณากรอก Email Address ของท่านแล้วกดค้นหา <span style="color: red;">*</span></label>
                <small class="forgot-password"><a href="{{ url('/') }}">กลับหน้าหลัก</a></small>
            </div>
            <div class="input-group">
                <input type="email" class="form-control @error('error') is-invalid @enderror" name="email" id="email" placeholder="..." maxlength="50" required>
                <button type="submit" class="btn btn-submit">ค้นหา</button>
                @error('error')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </form>
        
        
        @session('reset_password_check_session')
            <div class="p-3 mt-5" style="border: 1px dotted grey; border-radius: 10px; background-color: rgb(242, 242, 242);">
                <form action="{{ route('submit_reset_password.check', $value->userID) }}" method="POST">
                    @csrf
                    <p><b>Step 1 : </b>ท่านกำลังรีเซ็ตรหัสผ่านสำหรับบัญชีผู้ใช้ <i class="fw-bolder text-danger">{{ $value->email }}</i><br>
                    ระบบจะแสดงคำถาม/คำใบ้ ที่ท่านตั้งค่าไว้ กรุณากรอกคำตอบให้ถูกต้อง</p>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="question" class="form-label">คำถาม</label>
                            <input type="text" id="question" class="form-control" value="{{ $value->forget_password_question }}" disabled readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="hint" class="form-label">คำใบ้</label>
                            <input type="text" id="hint" class="form-control" value="{{ $value->forget_password_hint }}" disabled readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" name="forget_password_answer" class="form-control" placeholder="..." maxlength="100" required>
                            <small class="text-danger"><i>กรุณากรอกคำตอบให้ถูกต้องเพื่อรีเซ็ตรหัสผ่าน</i></small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <button type="submit" class="mt-2 btn btn-secondary w-100">ตรวจสอบ</button>
                        </div>
                    </div>
                </form>
            </div>
        @endsession
        @session('reset_password_session')
            <div class="p-3 mt-5" style="border: 1px dotted grey; border-radius: 10px; background-color: rgb(242, 242, 242);">
                <form action="{{ route('submit_reset_password', $value->userID) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <p><b>Step 2 : </b>คำตอบถูกต้อง ท่านกำลังรีเซ็ตรหัสผ่านสำหรับบัญชีผู้ใช้ <i class="fw-bolder text-danger">{{ $value->email }}</i></p>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="password" name="password" id="password" placeholder="..." class="form-control" minlength="8" maxlength="20">
                            <small class="text-danger"><i>กรอกรหัสผ่านใหม่ ความยาว 8-20 ตัวอักษร</i></small>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="..." class="form-control @error('password') is-invalid @enderror" minlength="8" maxlength="20">
                            <small class="text-danger"><i>ยืนยันรหัสผ่าน</i></small>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <button type="submit" class="mt-2 btn btn-secondary w-100">แก้ไขรหัสผ่าน</button>
                        </div>
                    </div>
                </form>
            </div>
        @endsession
    </div>
@endsection