<title>Settings | {{ $company_info->name }}</title>

@extends('layouts.admin')

@section('admin-content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-user icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>ตั้งค่าการใช้งาน
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title text-primary">กำหนดตำแหน่ง</h5>
                                <form action="add_position.submit" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="position-relative">
                                                <label for="name" class="form-label">เพิ่มข้อมูล <span class="text-danger"> *</span></label>
                                                <input type="text" name="name" id="name" placeholder="..." class="form-control" maxlength="100" required>
                                                <input type="hidden" name="updated_by" value="{{ Auth::id() }}" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary w-100">บันทึก</button>
                                </form>
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped table-hover css-serial table-sm small">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">#</th>
                                                <th scope="col">ตำแหน่ง</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($setting_positions as $position)
                                            <tr>
                                                <td class="text-center"></td>
                                                <td>{{ $position->name }}</td>
                                                <td class="text-right">
                                                    <div role="group" class="btn-group-sm btn-group btn-group-toggle">
                                                        <button class="btn btn-sm btn-outline-secondary" onclick="openModal('positionModal-{{ $position->positionID }}')">แก้ไข</button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="openModal('deletePositionModal-{{ $position->positionID }}')">ลบ</button>
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
                    <div class="col-md-4">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title text-primary">กำหนดประเภทเอกสารดาวน์โหลด</h5>
                                <form action="add_book_type.submit" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="position-relative">
                                                <label for="name" class="form-label">เพิ่มข้อมูล <span class="text-danger"> *</span></label>
                                                <input type="text" name="name" id="name" placeholder="..." class="form-control" maxlength="50" required>
                                                <input type="hidden" name="updated_by" value="{{ Auth::id() }}" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary w-100">บันทึก</button>
                                </form>
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped table-hover css-serial table-sm small">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">#</th>
                                                <th scope="col">ประเภทเอกสาร</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($setting_book_type as $booktype)
                                            <tr>
                                                <td></td>
                                                <td>{{ $booktype->name }}</td>
                                                <td class="text-right">
                                                    <div role="group" class="btn-group-sm btn-group btn-group-toggle">
                                                        <button class="btn btn-sm btn-outline-secondary" onclick="openModal('booktypeModal-{{ $booktype->booktypeID }}')">แก้ไข</button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="openModal('deleteBooktypeModal-{{ $booktype->booktypeID }}')">ลบ</button>
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
                    <div class="col-md-4">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title text-primary">กำหนดวิธีการทดสอบ/เทคนิค</h5>
                                <form action="add_test_type.submit" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="position-relative">
                                                <label for="name" class="form-label">เพิ่มข้อมูล <span class="text-danger"> *</span></label>
                                                <input type="text" name="name" id="name" placeholder="..." class="form-control" maxlength="50" required>
                                                <input type="hidden" name="updated_by" value="{{ Auth::id() }}" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary w-100">บันทึก</button>
                                </form>
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped table-hover css-serial table-sm small">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">#</th>
                                                <th scope="col">วิธีการทดสอบ/เทคนิค</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($setting_test_type as $testtype)
                                            <tr>
                                                <td class="text-center"></td>
                                                <td>{{ $testtype->name }}</td>
                                                <td class="text-right">
                                                    <div role="group" class="btn-group-sm btn-group btn-group-toggle">
                                                        <button class="btn btn-sm btn-outline-secondary" onclick="openModal('testtypeModal-{{ $testtype->testtypeID }}')">แก้ไข</button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="openModal('deleteTesttypeModal-{{ $testtype->testtypeID }}')">ลบ</button>
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
    
    
    @foreach ($setting_positions as $position)
    <div class="pure-modal" id="positionModal-{{ $position->positionID }}">
        <div class="pure-modal-dialog">
            <div class="pure-modal-header d-flex justify-content-between align-items-center bg-secondary">
                <h5 class="pure-modal-title text-white">แก้ไขตำแหน่ง</h5>
                <button class="pure-modal-close text-white" onclick="closeModal('positionModal-{{ $position->positionID }}')">&times;</button>
            </div>
            <form action="{{ route('edit_position.submit', $position->positionID) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="pure-modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <input type="hidden" name="userID" value="{{ Auth::user()->userID }}" readonly required>
                            <label for="edit_name" class="form-label">ตำแหน่ง <span class="text-danger"> *</span></label>
                            <input type="text" name="edit_name" id="edit_name" class="form-control" value="{{ $position->name }}" maxlength="100" required>
                        </div>
                        <div class="col-md-5">
                            <label for="updated_by" class="form-label">แก้ไขโดย</label>
                            <input type="text" id="updated_by" class="form-control" value="{{ Auth::user()->name }}" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="pure-modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModal('positionModal-{{ $position->positionID }}')">ยกเลิก</button>
                    <button type="submit" class="btn btn-secondary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>

    <div class="pure-modal" id="deletePositionModal-{{ $position->positionID }}">
        <div class="pure-modal-dialog">
            <div class="pure-modal-header d-flex justify-content-between align-items-center bg-danger">
                <h5 class="pure-modal-title text-white">ลบตำแหน่ง</h5>
                <button class="pure-modal-close text-white" onclick="closeModal('deletePositionModal-{{ $position->positionID }}')">&times;</button>
            </div>
            <form action="{{ route('delete_position.submit', $position->positionID) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="pure-modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <input type="hidden" name="userID" value="{{ Auth::user()->userID }}" readonly required>
                            <label for="name" class="form-label">ตำแหน่ง</label>
                            <input type="text" id="name" class="form-control" value="{{ $position->name }}" readonly disabled>
                        </div>
                        <div class="col-md-5">
                            <label for="updated_by" class="form-label">แก้ไขโดย</label>
                            <input type="text" id="updated_by" class="form-control" value="{{ Auth::user()->name }}" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="pure-modal-footer">
                    <button type="button" class="btn btn-outline-danger" onclick="closeModal('deletePositionModal-{{ $position->positionID }}')">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    @foreach ($setting_book_type as $booktype)
    <div class="pure-modal" id="booktypeModal-{{ $booktype->booktypeID }}">
        <div class="pure-modal-dialog">
            <div class="pure-modal-header d-flex justify-content-between align-items-center bg-secondary">
                <h5 class="pure-modal-title text-white">แก้ไขประเภทเอกสาร</h5>
                <button class="pure-modal-close text-white" onclick="closeModal('booktypeModal-{{ $booktype->booktypeID }}')">&times;</button>
            </div>
            <form action="{{ route('edit_booktype.submit', $booktype->booktypeID) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="pure-modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <input type="hidden" name="userID" value="{{ Auth::user()->userID }}" readonly required>
                            <label for="edit_name" class="form-label">ประเภทเอกสาร <span class="text-danger"> *</span></label>
                            <input type="text" name="edit_name" id="edit_name" class="form-control" value="{{ $booktype->name }}" maxlength="50" required>
                        </div>
                        <div class="col-md-5">
                            <label for="updated_by" class="form-label">แก้ไขโดย</label>
                            <input type="text" id="updated_by" class="form-control" value="{{ Auth::user()->name }}" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="pure-modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModal('booktypeModal-{{ $booktype->booktypeID }}')">ยกเลิก</button>
                    <button type="submit" class="btn btn-secondary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>

    <div class="pure-modal" id="deleteBooktypeModal-{{ $booktype->booktypeID }}">
        <div class="pure-modal-dialog">
            <div class="pure-modal-header d-flex justify-content-between align-items-center bg-danger">
                <h5 class="pure-modal-title text-white">ลบประเภทเอกสาร</h5>
                <button class="pure-modal-close text-white" onclick="closeModal('deleteBooktypeModal-{{ $booktype->booktypeID }}')">&times;</button>
            </div>
            <form action="{{ route('delete_book_type.submit', $booktype->booktypeID) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="pure-modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <input type="hidden" name="userID" value="{{ Auth::user()->userID }}" readonly required>
                            <label for="name" class="form-label">ประเภทเอกสาร</label>
                            <input type="text" id="name" class="form-control" value="{{ $booktype->name }}" readonly disabled>
                        </div>
                        <div class="col-md-5">
                            <label for="updated_by" class="form-label">ลบโดย</label>
                            <input type="text" id="updated_by" class="form-control" value="{{ Auth::user()->name }}" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="pure-modal-footer">
                    <button type="button" class="btn btn-outline-danger" onclick="closeModal('deleteBooktypeModal-{{ $booktype->booktypeID }}')">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                </div>
            </form>
        </div>
    </div>    
    @endforeach

    @foreach ($setting_test_type as $testtype)
    <div class="pure-modal" id="testtypeModal-{{ $testtype->testtypeID }}">
        <div class="pure-modal-dialog">
            <div class="pure-modal-header d-flex justify-content-between align-items-center bg-secondary">
                <h5 class="pure-modal-title text-white">แก้ไขวิธีการทดสอบ</h5>
                <button class="pure-modal-close text-white" onclick="closeModal('testtypeModal-{{ $testtype->testtypeID }}')">&times;</button>
            </div>
            <form action="{{ route('edit_testtype.submit', $testtype->testtypeID) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="pure-modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <input type="hidden" name="userID" value="{{ Auth::user()->userID }}" readonly required>
                            <label for="edit_name" class="form-label">วิธีการทดสอบ/เทคนิค <span class="text-danger"> *</span></label>
                            <input type="text" name="edit_name" id="edit_name" class="form-control" value="{{ $testtype->name }}" maxlength="50" required>
                        </div>
                        <div class="col-md-5">
                            <label for="updated_by" class="form-label">แก้ไขโดย</label>
                            <input type="text" id="updated_by" class="form-control" value="{{ Auth::user()->name }}" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="pure-modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModal('testtypeModal-{{ $testtype->testtypeID }}')">ยกเลิก</button>
                    <button type="submit" class="btn btn-secondary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>

    <div class="pure-modal" id="deleteTesttypeModal-{{ $testtype->testtypeID }}">
        <div class="pure-modal-dialog">
            <div class="pure-modal-header d-flex justify-content-between align-items-center bg-danger">
                <h5 class="pure-modal-title text-white">ลบวิธีการทดสอบ</h5>
                <button class="pure-modal-close text-white" onclick="closeModal('deleteTesttypeModal-{{ $testtype->testtypeID }}')">&times;</button>
            </div>
            <form action="{{ route('delete_test_type.submit', $testtype->testtypeID) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="pure-modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <input type="hidden" name="userID" value="{{ Auth::user()->userID }}" readonly required>
                            <label for="name" class="form-label">วิธีการทดสอบ/เทคนิค</label>
                            <input type="text" id="name" class="form-control" value="{{ $testtype->name }}" readonly disabled>
                        </div>
                        <div class="col-md-5">
                            <label for="updated_by" class="form-label">ลบโดย</label>
                            <input type="text" id="updated_by" class="form-control" value="{{ Auth::user()->name }}" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="pure-modal-footer">
                    <button type="button" class="btn btn-outline-danger" onclick="closeModal('deleteTesttypeModal-{{ $testtype->testtypeID }}')">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
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