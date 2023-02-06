<!-- Main Header-->
<div class="main-header side-header sticky">
    <div class="container-fluid">
        <div class="main-header-left">
            <a class="main-logo d-lg-none" href="dashboard">
                <img src="{{ asset('logo.png') }}" class="header-brand-img desktop-logo" alt="">
                <img src="{{ asset('logo.png') }}" class="header-brand-img icon-logo" alt="">
                <img src="{{ asset('logo.png') }}" class="header-brand-img desktop-logo theme-logo" alt="">
                <img src="{{ asset('logo.png') }}" class="header-brand-img icon-logo theme-logo" alt="">
            </a>
            <a class="main-header-menu-icon" href="" id="mainSidebarToggle"><span></span></a>
        </div>
        <div class="main-header-right">
            <div class="dropdown main-profile-menu">
                <a class="main-img-user" href="" style="color: #334151"> <i class="fe fe-user"
                        style="font-size: 30px"></i></a>
                <div class="dropdown-menu">
                    <div class="header-navheading">
                        <h6 class="main-notification-title">Admin</h6>
                        <p class="main-notification-text">Admin Panel</p>
                    </div>
                    <a class="dropdown-item" href="appsetting">
                        <i class="fe fe-settings"></i> App Settings
                    </a>
                    <a class="dropdown-item" href="logout">
                        <i class="fe fe-power"></i> Log Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Header-->
