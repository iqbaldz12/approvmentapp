<!--begin::Navbar-->
<div class="app-navbar flex-shrink-0">
    <!--begin::Notifications-->
	<div class="app-navbar-item ms-1 ms-md-4">
        <!--begin::Menu- wrapper-->
		<div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">{!! getIcon('notification-status', 'fs-2') !!}</div>
        @include('partials/menus/_notifications-menu')
        <!--end::Menu wrapper-->
    </div>
    <!--end::Notifications-->
    <!--begin::User menu-->
    <div class="app-navbar-item ms-1 ms-md-4">
        <!--begin::Menu-wrapper-->
<<<<<<< HEAD
        <div class="d-flex justify-content-center">
            <div class="dropdown">
                <button class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px dropdown-toggle" type="button" id="logoutDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {!! getIcon('element-11', 'fs-2') !!}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="logoutDropdown">
                    <!--begin::User info-->
                    <center><div class="fw-bold">{{ ucfirst(strtolower(str_replace(' ', '', Auth::user()->fullname))) }}</div></center>
                    <center><div class="text-muted">Role: {{ ucfirst(strtolower(str_replace(' ', '', Auth::user()->role))) }}</div></center>
                    <hr>
                    <!--end::User info-->
                    <center><li><a class="dropdown-item" href="/logout">Logout</a></li></center>
                </ul>
            </div>
        </div>        
=======
        <div class="dropdown">
            <button class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px dropdown-toggle" type="button" id="logoutDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                {!! getIcon('element-11', 'fs-2') !!}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="logoutDropdown">
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </div>
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
        <!--end::Menu-wrapper-->
    </div>
    <!--end::User menu-->
    <!--begin::Header menu toggle-->
	<div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
		<div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">{!! getIcon('element-4', 'fs-1') !!}</div>
    </div>
    <!--end::Header menu toggle-->
	<!--begin::Aside toggle-->
	<!--end::Header menu toggle-->
</div>
<!--end::Navbar-->
