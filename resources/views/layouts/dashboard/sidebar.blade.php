<!--sidebar Begins-->
<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        <img class="admin-brand-logo" src="{{ asset('atmos/light/assets/img/logo.png') }}" width="40" alt="">
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            {{-- <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a> --}}
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar"></a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">

            <li class="menu-item ">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Dashboard</span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-view-dashboard-outline "></i>
                    </span>
                </a>
            </li>

            <!-- Role for Admin -->
            @if (Auth::user()->role_id == 1)
                <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                            <span class="menu-name">Companies
                                <span class="menu-arrow"></span>
                            </span>
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-city "></i>
                        </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">

                        <li class="menu-item ">
                            <a href="{{ route('index.company') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">Add New</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder  mdi mdi-table-plus "></i>
                                </span>
                            </a>
                        </li>

                        <li class="menu-item ">
                            <a href="{{ route('list.company') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">Company List</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder  mdi mdi-format-list-bulleted-type "></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                            <span class="menu-name">Employees
                                <span class="menu-arrow"></span>
                            </span>
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-account-box-multiple "></i>
                        </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">

                        <li class="menu-item ">
                            <a href="#" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">Add New</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-account-plus-outline "></i>
                                </span>
                            </a>
                        </li>

                        <li class="menu-item ">
                            <a href="#" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">Employee List</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-account-multiple-outline "></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>

    </div>

</aside>
<!--sidebar Ends-->
