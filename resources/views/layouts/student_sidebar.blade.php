

<!-- drawer -->
<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-light sidebar-light-dodger-blue sidebar-left" data-perfect-scrollbar>
            <a href="/" class="sidebar-brand p-0 navbar-height d-flex justify-content-center">
                <span class="avatar avatar-sm ">
                    <span class="avatar-title rounded bg-primary"><img src="{{ asset('assets/images/illustration/teacher/128/white.svg') }}" class="img-fluid" alt="logo" /></span>
                </span>
            </a>
            <div class="sidebar-heading">Student</div>
            <ul class="sidebar-menu">


                <li class="sidebar-menu-item active">
                    <a class="sidebar-menu-button" href="{{url('student/dashboard')}}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">school</span>
                        <span class="sidebar-menu-text">Student Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button"  href="{{url('student/profile')}}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">account_box</span>
                        Account
                        <span class="sidebar-menu-text"></span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ url('student/browse-courses') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">import_contacts</span>
                        <span class="sidebar-menu-text">Browse Courses</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ url('student/mycourses') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">import_contacts</span>
                        <span class="sidebar-menu-text">My Courses</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{url('student/getchat')}}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">message</i>
                        <span class="sidebar-menu-text">Messages</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>