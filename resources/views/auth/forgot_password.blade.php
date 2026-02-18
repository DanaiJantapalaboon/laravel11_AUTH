<title>ลืมรหัสผ่าน | Your Application</title>

@extends('layouts.auth')

@section('main-content')
    <div class="col-sm-6">
        <form action="">
            <h2 class="text-center fw-semibold">ลืมรหัสผ่าน</h2>
            <h6 class="text-center">โปรแกรม่าสฟห่ดสาฟหก่ดวสา</h6>
            <hr class="mb-5">

            <div class="d-flex justify-content-between">
                <label for="email" class="form-label">กรุณากรอก Email Address ของท่านแล้วกดค้นหา<span style="color: red;">*</span></label>
                <small class="forgot-password"><a href="{{ url('/') }}">กลับหน้าหลัก</a></small>
            </div>
            <div class="input-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="..." maxlength="30" required>
                <button type="submit" name="findEmail" class="btn btn-submit">ค้นหา</button>
            </div>
        </form>
    </div>
@endsection