<title>Login | {{ $company_info->name }}</title>

@extends('layouts.auth')

@section('main-content')
    <div class="col-sm-6">
        <form action="/authenticate" method="POST">
            @csrf
            <h2 class="text-center fw-semibold">เข้าสู่ระบบ</h2>
            <h6 class="text-center">{{ $company_info->name }}</h6>
            @session('success')
                <p class="alert alert-success p-1 small text-center">{{ $value }}</p>
            @endsession
            @error('error')
                <p class="alert alert-danger p-1 small text-center">{{ $message }}</p>
            @enderror
            <hr class="mb-5">
            <label for="email" class="form-label">อีเมลล์ <span style="color: red;">*</span></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="..." maxlength="50" required>
        
            <label for="password" class="form-label">รหัสผ่าน <span style="color: red;">*</span></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="..." minlength="8" maxlength="20" required>
            <div class="d-flex justify-content-between mb-5">
                <small class="register">ยังไม่มีบัญชีผู้ใช้ --> <a href="">Register</a></small>
                {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                    <label class="form-check-label small" for="rememberMe">จดจำฉันไว้</label>
                </div> --}}
                <small class="forgot-password"><a href="/forgot_password">ลืมรหัสผ่าน</a> | <a href="#">ล็อกอินครั้งแรก</a></small>
            </div>
            <button type="submit" name="submitLogin" class="btn btn-submit w-100">เข้าสู่ระบบ</button>
        </form>
    </div>
@endsection