<title>User Management | Your Application</title>

@extends('layouts.admin')

@section('user_management_edit-content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-user icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>แก้ไขบัญชีผู้ใช้
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.</div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="{{ route('user_management') }}" class="btn btn-dark px-3"><i class="lnr-chevron-left"></i> Back</a>
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
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title text-primary">ข้อมูลส่วนตัว</h5>
                            <h5 class="card-title text-success">Account Status : Active</h5>
                        </div>
                        <form action="{{ route('submit_editaccount', $user_edit->userID) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-4 text-center">
                                    <img width="180" class="rounded-circle" src="{{ asset('images/my.webp') }}" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">อีเมลล์ (ใช้สำหรับเข้าสู่ระบบ)</label>
                                            <input type="email" id="email" class="form-control" value="{{ $user_edit->email }}" readonly disabled>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">ชื่อ-สกุล</label>
                                            <input type="text" id="name" class="form-control" value="{{ $user_edit->name }}" readonly disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="position" class="form-label">ตำแหน่ง <span class="text-danger"> *</span></label>
                                            <select name="position" id="position" placeholder="..." class="form-control" required>
                                                <option selected value="{{ $user_edit->position }}">{{ $user_edit->position }}</option>
                                                <option value="ตำแหน่ง 1">ตำแหน่ง 1</option>
                                                <option value="ตำแหน่ง 2">ตำแหน่ง 2</option>
                                                <option value="ตำแหน่ง 3">ตำแหน่ง 3</option>
                                                <option value="ตำแหน่ง 4">ตำแหน่ง 4</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="updated_at" class="form-label">วันที่แก้ไขล่าสุด</label>
                                            <input type="text" id="updated_at" class="form-control" value="{{ $user_edit->updated_at }}" readonly disabled>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-danger">จัดการบัญชีผู้ใช้</h5>
                        <b>คำแนะนำ</b>
                        <p>
                            <span class="text-secondary">1. การรีเซ็ตรหัสผ่าน จะเป็นการล้างรหัสผ่านที่ตั้งค่าไว้ ผู้ใช้จะต้องกำหนดรหัสผ่านใหม่เสมือนกับการเริ่มใช้งานครั้งแรก</span><br>
                            <span class="text-danger">2. การระงับบัญชีผู้ใช้ จะเป็นการงดใช้บัญชีนี้ชั่วคราว (disabled) ผู้ใช้จะไม่สามารถล็อกอินได้จนกว่าผู้ดูแลระบบจะกู้คืนบัญชีให้ใหม่</span>
                        </p>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="position-relative">
                                    <button type="button" class="btn btn-primary btn-secondary w-100">รีเซ็ตรหัสผ่าน</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="position-relative">
                                    <button type="button" class="btn btn-primary btn-danger w-100" onclick="openModal()">ระงับบัญชีผู้ใช้</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pure-modal" id="accountModal">
        <div class="pure-modal-dialog">
            <div class="pure-modal-header d-flex justify-content-between align-items-center bg-danger">
                <h5 class="pure-modal-title text-white">ระงับบัญชีผู้ใช้</h5>
                <button class="pure-modal-close text-white" onclick="closeModal('accountModal')">&times;</button>
            </div>
            <form action="{{ route('submit_editaccount', $user_edit->userID) }}" method="POST">
                <div class="pure-modal-body">
                    @method('PATCH')
                    @csrf
                    {{-- <input type="hidden" id="edit_id"> --}}
                    <label for="email" class="form-label">กรุณากรอกอีเมลล์ของบัญชีนี้ให้ถูกต้องเพื่อยืนยันการระงับบัญชีผู้ใช้ และกดบันทึก <span class="text-danger"> *</span></label>
                    <input type="email" name="email" id="email" placeholder="..." class="form-control" maxlength="50" required>
                </div>
                <div class="pure-modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('accountModal')">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    function openModal() {
        // document.getElementById('edit_id').value = id;
        document.getElementById('accountModal').classList.add('active');
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