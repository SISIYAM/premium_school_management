<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{ asset('assets/images/logo-dark.svg') }}" class="img-fluid logo-lg" alt="logo" />
                <span class="badge bg-light-success rounded-pill ms-2 theme-version">v9.4.3</span>
            </a>
        </div>
        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user-image"
                                class="user-avtar wid-45 rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">
                            @if (Auth::check())
                                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                <small>{{ Auth::user()->role }}</small>
                            @else
                                <h6 class="mb-0">Guest</h6>
                            @endif


                        </div>
                        <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse"
                            href="#pc_sidebar_userlink">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-sort-outline"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="collapse pc-user-links" id="pc_sidebar_userlink">
                        <div class="pt-3">
                            <a href="#">
                                <i class="ti ti-user"></i>
                                <span>My Account</span>
                            </a>
                            <a href="#">
                                <i class="ti ti-settings"></i>
                                <span>Settings</span>
                            </a>
                            <a href="#">
                                <i class="ti ti-lock"></i>
                                <span>Lock Screen</span>
                            </a>
                            <a href="{{ route('admin.logout') }}">
                                <i class="ti ti-power"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('admin.dashboard') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-status-up"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-user"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Student Information</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('admin.student.details') }}">Student Details</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('admin.student.create') }}">Create Student</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('admin.list.desabled.student') }}">Disabled Students</a>
                        </li>

                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-cash"></i>
                        </span>
                        <span class="pc-mtext">Fees Collection</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="">Collect Fees</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Offline Bank Payments</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Search Fees Payments</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Search Due Fees</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Fees Master</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Fees Group</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Fees Type</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Fees Discount</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Fees Carry Forward</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Fees Reminder</a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-currency-dollar"></i>
                        </span>
                        <span class="pc-mtext">Income</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="">Add Income</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Search Income</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Income Head</a>
                        </li>

                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-license"></i>
                        </span>
                        <span class="pc-mtext">Expences</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="">Expenses Income</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Expenses Income</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Expenses Head</a>
                        </li>

                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-book"></i>
                        </span>
                        <span class="pc-mtext">Examination</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="">Exam Group</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Exam Schedule</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Exam Result</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Design Admit Card</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Print Admit Card</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Design Mark Sheet</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Print Marksheet</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Marks Grade</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Marks Division</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-check">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M11.5 21h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v6" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M4 11h16" />
                                <path d="M15 19l2 2l4 -4" />
                            </svg>
                        </span>
                        <span class="pc-mtext">Student Attendance</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('admin.take.student.attendance') }}">Attendance</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Application Leave</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Attendace By Date</a>
                        </li>

                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-user-check"></i>

                        </span>
                        <span class="pc-mtext">Teachers Attendance</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="">Attendance</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Application Leave</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Attendace By Date</a>
                        </li>

                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-certificate"></i>


                        </span>
                        <span class="pc-mtext">Academics</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="">Class Timetable</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Teachers Timetable</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Assign Class Teacher</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Promote Class Students</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Subject Group</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Subjects</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Class</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Sections</a>
                        </li>
                    </ul>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-speakerphone"></i>

                        </span>
                        <span class="pc-mtext">Communicate</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="">Notice Board</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Send Email</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Send SMS</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Email/SMS Log</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Login Credintial</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Email Template</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-library">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                <path
                                    d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                                <path d="M11 7h5" />
                                <path d="M11 10h6" />
                                <path d="M11 13h3" />
                            </svg>

                        </span>
                        <span class="pc-mtext">Library</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="">Book List</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Issue - Return</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Add Students</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Add Staff Member</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-id"></i>

                        </span>
                        <span class="pc-mtext">Certificate</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="">Student Certificate</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Generate Certificate</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Student ID Card</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Generate ID Card</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Staff ID Card</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Generate Staff ID Card</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-caption">
                    <label>Other</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-settings"></i>

                        </span>
                        <span class="pc-mtext">Settings</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('admin.manage.class.list') }}">Manage Classes</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('admin.manage.section.list') }}">Manage Sections </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Manage Student Categories</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Manage Student Hostels</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Student ID Card</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Generate ID Card</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Staff ID Card</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="">Generate Staff ID Card</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item">
                    <a href="../widget/w_chart.html" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-presentation-chart"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">SEI Innovations</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
