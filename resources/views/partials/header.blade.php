<div class="page-main-header">
    <div class="main-header-left">
        <div class="logo-wrapper">
            <!-- <a href="/"> -->
                <!-- <img src="{{ URL::asset('assets/images/logo-light.png') }}" class="image-dark" alt="" />
                <img src="{{ URL::asset('assets/images/logo-light-dark-layout.png') }}" class="image-light"
                alt="" /> -->
                <div class="row">
                    <dir class="col-sm-4 text-center">
                        <img src="{{ URL::asset('logo.png') }}" class="image-light" alt="" style="max-width: 80%; height: auto;" />        
                    </dir>
                    <dir class="col-sm-8" style="vertical-align: middle; padding-left: 0px !important;">
                        <h3 style="font-weight: bold;">ADMIN</h3>
                        <h6 style="color: #808080;">Desa Bululawang</h6>            
                    </dir>
                </div>

                <!-- </a> -->
            </div>
        </div>
        <div class="main-header-right row">
            <div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch">
                        <input type="checkbox" id="sidebar-toggle" checked>
                        <span class="switch-state"></span>
                    </label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                    <li class="onhover-dropdown">
                        <div class="media  align-items-center">
                            <img class="align-self-center pull-right mr-2"
                            src="{{ URL::asset('assets/images/dashboard/user.png') }}" alt="header-user" />
                            <div class="media-body">
                                <h6 class="m-0 txt-dark f-16">

                                    <i class="fa fa-angle-down pull-right ml-2"></i>
                                </h6>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20">
                            <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-power-off"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="d-lg-none mobile-toggle">
            <i class="icon-more"></i>
        </div>
    </div>
</div>
</div>