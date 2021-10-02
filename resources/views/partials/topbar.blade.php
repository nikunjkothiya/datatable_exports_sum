<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box mt-3">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-dark text-dark h3">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/admin_logo.png') }}" alt="" height="22">
                    </span>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="logo logo-light text-white h3">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/admin_logo.png') }}" alt="" height="22">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect mt-4" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown ">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/admin_logo.png') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">Admin</span>

                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <!--  <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i>
                        Profile</a> -->
                    <a class="dropdown-item text-danger nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                        Logout
                    </a>
                    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

            <div class="dropdown d-none">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header> <!-- ========== Left Sidebar Start ========== -->