
<div id="sidepanel-drop" class="sidepanel-drop"></div>
<div class="sidepanel-inner d-flex flex-column">
    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
    <div class="app-branding">
        <a class="app-logo" href="{{ route('welcome') }}"><img class="logo-icon me-2" src="{{ asset('public/assets/images/icon.png') }}" alt="logo"><span class="logo-text">EXAM TEST</span></a>
    </div><!--//app-branding-->

    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
        <ul class="app-menu list-unstyled accordion" id="menu-accordion">
            <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                     <span class="fa fa-dashboard"></span>
                     <span class="nav-link-text">Dashboard</span>
                </a><!--//nav-link-->
            </li><!--//nav-item-->
            <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link {{ Route::is('admin.users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                     <span class="fa fa-users"></span>
                     <span class="nav-link-text">Users</span>
                </a><!--//nav-link-->
            </li><!--//nav-item-->
            <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link {{ Route::is('admin.exams*') ? 'active' : '' }}" href="{{ route('admin.exams.index') }}">
                     <span class="fa fa-folder"></span>
                     <span class="nav-link-text">Exam Results</span>
                </a><!--//nav-link-->
            </li><!--//nav-item-->
            <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link {{ Route::is('admin.setting') ? 'active' : '' }}" href="{{ route('admin.setting') }}">
                    <span class="fa fa-cog"></span>
                    <span class="nav-link-text">Settings</span>
                </a><!--//nav-link-->
            </li><!--//nav-item-->
        </ul><!--//app-menu-->
    </nav><!--//app-nav-->

</div><!--//sidepanel-inner-->
