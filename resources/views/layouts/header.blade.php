<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Admin | Tapovan</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon.png') }}">
    <link href="{{ asset('vendor/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link href="{{ URL::to('https://cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.3/multiple-select.css') }}" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ URL::to('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full"
        data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand">
                        <a href="{{ URL::to('/') }}" class="logo">
                            <b class="logo-icon">
                                <img src="{{ asset('/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{ asset('/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="{{ asset('/images/logo-text.png') }}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="{{ asset('/images/logo-light-text.png') }}" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>

                </div>
                <div class="navbar-collapse collapse justify-content-end" id="navbarSupportedContent" data-navbarbg="skin6">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item search-box">

                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('/images/user1.jpg') }}" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user me-1 ms-1"></i>
                                    My Profile
                                </a>
                                <form id="logout-form" action="{{ url('logout') }}" method="POST" class="mb-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="ti-power-off text-primary pl-1 pr-2"></i>Logout</button>
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>


        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item {{ Request::segment(1) === 'patients' ? 'active' : ''}}">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ URL::to('/patients')}}"
                                aria-expanded="false">
                                <i class="mdi mdi-face"></i>
                                <span class="hide-menu">Patients</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ URL::to('/')}}"
                                aria-expanded="false">
                                <i class="mdi mdi-food-off"></i>
                                <span class="hide-menu">Diet Chart</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ URL::to('/')}}"
                                aria-expanded="false">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">Reports</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::segment(1) === 'users' ? 'active' : ''}}">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ URL::to('/users')}}"
                                aria-expanded="false">
                                <i class="mdi mdi-face"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::segment(1) === 'patient-treatments' ? 'active' : ''}}">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-medical-bag"></i>
                                <span class="hide-menu">Patient Treatments</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level {{ Request::segment(1) === 'patient-treatments' ? 'in' : ''}}">
                                <li class="sidebar-item pl-5 {{ Request::is('patient-treatments') ? 'active' : ''}}">
                                    <a class="sidebar-link waves-effect waves-dark" href="{{ Route('patient-treatments.index')}}" aria-expanded="false">
                                        <span class="hide-menu">View PT</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item {{ Request::segment(1) === 'diseases' || Request::segment(1) === 'treatment' ? 'active' : '' }}">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings feather-sm"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                <span class="hide-menu">Settings</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level {{ Request::segment(1) === 'diseases' || Request::segment(1) === 'treatment' ? 'in' : ''}}">
                                <li class="sidebar-item {{ Request::segment(1) === 'diseases' ? 'active' : ''}}">
                                    <a class="sidebar-link waves-effect waves-dark" href="{{ URL::to('/diseases')}}"
                                        aria-expanded="false">
                                        <i class="mdi mdi-svg"></i>
                                        <span class="hide-menu">Disease</span>
                                    </a>
                                </li>
                                <li class="sidebar-item {{ Request::segment(1) === 'treatment' ? 'active' : ''}}">
                                    <a class="sidebar-link waves-effect waves-dark" href="{{ URL::to('/treatment')}}"
                                        aria-expanded="false">
                                        <i class="mdi mdi-medical-bag"></i>
                                        <span class="hide-menu">Treatments</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark" href="{{ URL::to('/')}}"
                                        aria-expanded="false">
                                        <img src="{{ asset('images/bed.png') }}" alt="icon">
                                        <span class="hide-menu">Roomtype</span>
                                    </a>
                                </li>
                            </ul>
                        </li> 
                    </ul>
                </nav>
            </div>
        </aside>
