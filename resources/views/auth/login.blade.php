<title>Login | Your Application</title>

@extends('layouts.auth')

@section('main-content')
    <div class="col-sm-6">
        <form action="">
            <h2 class="text-center fw-semibold">เข้าสู่ระบบ</h2>
            <h6 class="text-center">โปรแกรม่าสฟห่ดสาฟหก่ดวสา</h6>
            <hr class="mb-5">
            <label for="email" class="form-label">Email Address <span style="color: red;">*</span></label>
            <input type="email" class="form-control mb-3" name="email" id="email" placeholder="..." maxlength="30" required>
        
            <label for="password" class="form-label">Password <span style="color: red;">*</span></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="..." maxlength="10" required>
            <div class="d-flex justify-content-between mb-5">
                <small class="register">ยังไม่มีบัญชีผู้ใช้ --> <a href="">Register</a></small>
                <small class="forgot-password"><a href="{{ url('forgot_password') }}">ลืมรหัสผ่าน ?</a></small>
            </div>
            <button type="submit" name="submitLogin" class="btn btn-submit w-100">เข้าสู่ระบบ</button>
        </form>
    </div>
@endsection