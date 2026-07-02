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
                    <div>รายการทดสอบ
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
                @error('error')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">เพิ่มรายการทดสอบ</h5>
                        <form action="add_testing.submit" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="name" class="form-label">ชื่อรายการทดสอบ <span class="text-danger"> *</span></label>
                                        <input type="name" name="name" id="name" placeholder="..." class="form-control @error('error') is-invalid @enderror" maxlength="100" required>
                                        @error('error')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <label for="testtypeID" class="form-label">วิธีทดสอบ/เทคนิค <span class="text-danger"> *</span></label>
                                        <select name="testtypeID" id="testtypeID" placeholder="..." class="form-control" required>
                                            <option value="" selected disabled>...</option>
                                                @foreach ($testtypes as $testtype)
                                                    <option value="{{ $testtype->testtypeID }}">{{ $testtype->test_type->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative">
                                        <input type="hidden" name="updated_by" value="{{ Auth::user()->userID }}" readonly required>
                                        <label for="updated_by" class="form-label">ผู้เพิ่มข้อมูล</label>
                                        <input type="text" id="updated_by" class="form-control" value="{{ Auth::user()->name }}" readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="position-relative">
                                        <label for="description" class="form-label">คำอธิบาย (จะแสดงเป็น tooltips หน้าเว็บไซต์เมื่อเอาเม้าส์ไปวาง) <span class="text-danger"> *</span></label>
                                        <input type="text" name="description" id="description" placeholder="..." class="form-control" maxlength="255" required>
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
                                        <label for="document">คลิก "Choose File" เพื่อเลือกไฟล์ใบนำส่งที่ต้องการ</label>
                                        <input type="file" name="document" id="document" class="form-control-file" accept=".pdf">
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
                                                    <th scope="col">ไอคอน</th>
                                                    <th scope="col">ชื่อการทดสอบ</th>
                                                    <th scope="col">วิธีทดสอบ</th>
                                                    <th class="text-center" scope="col">เอกสาร</th>
                                                    <th class="dt-center">Status</th>
                                                    <th class="dt-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                @foreach ($testings as $testing)
                                                <tr>
                                                    <td class="text-center"></td>
                                                    @if (is_null($testing->icon))
                                                        <td><img width="50" src="{{ asset('images/test.png') }}" alt=""></td>
                                                    @else
                                                        <td><img width="50" src="{{ asset($testing->icon) }}" alt=""></td>
                                                    @endif
                                                    <td>{{ $testing->name }}</td>
                                                    <td>{{ $testing->test_type->name }}</td>
                                                    @if (is_null($testing->document))
                                                        <td class="text-center text-danger">N/A</td>
                                                    @else
                                                        <td class="text-center text-success">Uploaded</td>
                                                    @endif
                                                    @if (is_null($testing->deleted_at))
                                                        <td class="text-center text-success">ACTIVE</td>
                                                    @else
                                                        <td class="text-center text-danger">DISABLED</td>
                                                    @endif
                                                    <td class="text-center">
                                                        <div role="group" class="btn-group-sm btn-group btn-group-toggle">
                                                            <a href="{{ route('testing_edit', $testing->testingID) }}" class="btn btn-sm btn-outline-secondary">แก้ไข</a>
                                                            @if (is_null($testing->deleted_at))
                                                                <button class="btn btn-sm btn-outline-danger" onclick="openModal('deleteModal-{{ $testing->testingID }}')">ลบ</button>
                                                            @endif
                                                        </div>
                                                    </td>
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
    
    @foreach ($testings as $testing)
    <div class="pure-modal" id="deleteModal-{{ $testing->testingID }}">
        <div class="pure-modal-dialog">
            <div class="pure-modal-header d-flex justify-content-between align-items-center bg-danger">
                <h5 class="pure-modal-title text-white">ลบรายการทดสอบ</h5>
                <button class="pure-modal-close text-white" onclick="closeModal('deleteModal-{{ $testing->testingID }}')">&times;</button>
            </div>
            <form action="{{ route('delete_testing.submit', $testing->testingID) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="pure-modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <input type="hidden" name="userID" value="{{ Auth::user()->userID }}" readonly required>
                            <label for="name" class="form-label">ชื่อการทดสอบ</label>
                            <input type="text" id="name" class="form-control" value="{{ $testing->name }}" readonly disabled>
                        </div>
                        <div class="col-md-5">
                            <label for="updated_by" class="form-label">ลบโดย</label>
                            <input type="text" id="updated_by" class="form-control" value="{{ Auth::user()->name }}" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="pure-modal-footer">
                    <button type="button" class="btn btn-outline-danger" onclick="closeModal('deleteModal-{{ $testing->testingID }}')">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger">ลบรายการ</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.add('active');
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