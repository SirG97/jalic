<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin :: @yield('title')</title>
    <link rel="favicon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/Chart.min.css">
    <link rel="stylesheet" href="/css/style.css">



</head>
<body>
<div class="">
    <div id="hamburger" class="navigation-menu">
        <svg width="20px" height="20px" viewBox="0 0 69 51" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill-rule="evenodd">
                <g fill-rule="nonzero" stroke="none">
                    <g>
                        <rect x="0" y="0" width="69" height="6.2072333" rx="3.10361665"></rect> <rect x="0" y="22" width="69" height="6.2072333" rx="3.10361665"></rect> <rect x="0" y="44.7927667" width="69" height="6.2072333" rx="3.10361665"></rect>
                    </g>
                </g>
            </g>
        </svg>
    </div>
    <nav class="nav nav-sidebar">
        <div class="nav_section">
            <div class="nav_section_content company">
                <div class="nav_item prelative">
                    <a href="" class="nav_flex">
                            <span class="company-icon d-flex justify-content-center align-items-center">
                             <i class="fas fa-shield-alt"></i>
                            </span>
                        <span class="company_text font-weight-bold">JON JALIC</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="nav_section margin-fix scroll-menu">
            <div class="nav_section_content">
                <div class="nav_item prelative">
                    <a href="/dashboard" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/dashboard')}}">
                           <span class="nav_link_icon">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                           </span>
                        <span class="nav_link_text">Dashboard</span>
                    </a>
                </div>
                <div class="nav_item prelative">
                    <a href="/profile" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/profile')}}">
                           <span class="nav_link_icon">
                            <i class="fas fa-fw fa-user"></i>
                           </span>
                        <span class="nav_link_text">Profile</span>
                    </a>
                </div>
                <div class="nav_item prelative">
                    <a href="/customers" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/customers')}}">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-users"></i>
                            </span>
                        <span class="nav_link_text">Customers</span>
                    </a>
                </div>
                <div class="nav_item prelative">
                    <a href="/new_customer" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/new_customer')}}">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-user-plus"></i>
                            </span>
                        <span class="nav_link_text">New Customer</span>
                    </a>
                </div>
                <div class="nav_item prelative">
                    <a href="/staff" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/staff')}}">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-headset"></i>
                            </span>
                        <span class="nav_link_text">Staff</span>
                    </a>
                </div>
                <div class="nav_item prelative">
                    <a href="/new_staff" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/new_staff')}}">
                        <span class="nav_link_icon">
                         <i class="fas fa-fw fa-user-lock"></i>
                        </span>
                        <span class="nav_link_text">New Staff</span>
                    </a>
                </div>
                <div class="nav_item prelative">
                    <a href="/contributions" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/contributions')}}">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-user-plus"></i>
                            </span>
                        <span class="nav_link_text">Contributions</span>
                    </a>
                </div>
                <div class="nav_item prelative">
                    <a href="/mark_contribution" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/mark_contribution')}}">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-paper-plane"></i>
                            </span>
                        <span class="nav_link_text">Mark Contribution</span>
                    </a>
                </div>
                <div class="nav_item prelative">
                    <a href="/message" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/message')}}">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-envelope"></i>

                            </span>
                        <span class="nav_link_text">Send SMS</span>
                    </a>
                </div>

                <div class="nav_item prelative">
                    <a href="/settings" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/settings')}}">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-cogs"></i>
                            </span>
                        <span class="nav_link_text">Settings</span>
                    </a>
                </div>
                <div class="nav_item prelative">
                    <a href="/logout" class="nav_link nav_flex {{\App\Classes\Menu::is_active('/logout')}}">
                         <span class="nav_link_icon">
                          <i class="fas fa-fw fa-sign-out-alt"></i>
                         </span>
                        <span class="nav_link_text">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
<header class="d-flex">
    <div class="header-page-title mr-auto">
        <div class="icon-block blue-bg">
            <i class="fas fa-fw @yield('icon')"></i>
        </div>
        <span class="header-page-title-text">@yield('title')</span>
    </div>

    <div class="header-nav">
            <span class="header-nav-item">
                <img class="avatar rounded-circle img-thumbnail img-fluid" src="/{{\App\Classes\Session::get('pics')}}" alt="profile pics">
{{--            <p class="avatar">Hi! Noble</p>--}}
            </span>
        <div class="nav-dropdown">
            <div class="nav-dropdown-item">
                <a href="/profile">
                    <div class="nav-dropdown-item-link">
                        Profile
                    </div>
                </a>
            </div>
            <div class="nav-dropdown-item">
                <a href="/settings">
                    <div class="nav-dropdown-item-link">
                        Settings
                    </div>
                </a>
            </div>
            <div class="nav-dropdown-item">
                <a href="/logout">
                <div class="nav-dropdown-item-link">
                    Logout
                </div>
                </a>
            </div>
        </div>
    </div>
</header>
<main class="main" id="main">
    <div class="main_container">
    @yield('content')
    </div>
</main>


<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/moment.min.js"></script>
<script src="/js/script.js"></script>

</body>
</html>