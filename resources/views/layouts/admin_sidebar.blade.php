<div class="app-sidebar sidebar-shadow bg-light sidebar-text-dark">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">


                <div class="text-center mt-3 mb-2">
                    <img src="{{ asset($company_info->logo) }}" style="width: 150px;">
                </div>


                <li class="app-sidebar__heading">Web page Management</li>
                <li>
                    <a href="widgets-chart-boxes.html"><i class="metismenu-icon lnr-picture"></i>ภาพแบนเนอร์</a>
                    <a href="/testing" class="{{ request()->is('testing') ? 'mm-active' : '' }}"><i class="metismenu-icon lnr-list"></i>รายการทดสอบ</a>
                    <a href="widgets-chart-boxes.html"><i class="metismenu-icon lnr-book"></i>เอกสารดาวน์โหลด</a>
                    <a href="widgets-chart-boxes.html"><i class="metismenu-icon lnr-bubble"></i>ข้อคิดเห็น/ข้อเสนอแนะ</a>
                </li>


                <li class="app-sidebar__heading">Settings</li>
                <li>
                    <a href="/setting" class="{{ request()->is('setting') ? 'mm-active' : '' }}"><i class="metismenu-icon lnr-cog"></i>ตั้งค่า</a>
                    <a href="/user_management" class="{{ request()->is('user_management') ? 'mm-active' : '' }}"><i class="metismenu-icon lnr-users"></i>ผู้ใช้งานระบบ</a>
                    <a href="/company" class="{{ request()->is('company') ? 'mm-active' : '' }}"><i class="metismenu-icon lnr-apartment"></i>ข้อมูลหน่วยงาน</a>
                    <hr>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="metismenu-icon lnr-exit"></i>Logout</a>
                    <form action="/logout" method="POST" id="logout-form">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>