<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo">
        <h6 style="color: seagreen"><b>IMS</b></h6>
        </div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li class="">
                    <a href="{{route('adminDashboard.index')}}">
                    <i class="metismenu-icon fas fa-chart-line"></i>
                        Dashboards
                        <!-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> -->
                    </a>
                    <!-- <ul>
                        <li>
                            <a href="index-2.html" class="">
                                <i class="metismenu-icon">
                                </i>Analytics
                            </a>
                        </li>
                        <li>
                            <a href="dashboards-commerce.html">
                                <i class="metismenu-icon">
                                </i>Commerce
                            </a>
                        </li>
                        <li>
                            <a href="dashboards-sales.html">
                                <i class="metismenu-icon">
                                </i>Sales
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i>
                                Minimal
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="dashboards-minimal-1.html">
                                        <i class="metismenu-icon">
                                        </i>Variation 1
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboards-minimal-2.html">
                                        <i class="metismenu-icon">
                                        </i>Variation 2
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="dashboards-crm.html">
                                <i class="metismenu-icon"></i>
                                CRM
                            </a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="#">
                    <i class="metismenu-icon fas fa-users-cog"></i>
                        Manage User
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('user.create')}}">
                                <i class="metismenu-icon"></i>
                                Add User
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.index')}}">
                                <i class="metismenu-icon">
                                </i>View User List
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.show',1)}}">
                                <i class="metismenu-icon">
                                </i>View User Requests
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#">
                    <i class="metismenu-icon fas fa-store"></i>
                        Manage Storage
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                    <li>
                            <a href="{{route('store.create')}}">
                                <i class="metismenu-icon"></i>
                                Add Storage
                            </a>
                        </li>
                        <li>
                            <a href="{{route('store.index')}}">
                                <i class="metismenu-icon">
                                </i>View Storage List
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                    <i class="metismenu-icon fas fa-layer-group"></i>
                        Manage Category
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                    <li>
                            <a href="{{route('category.create')}}">
                                <i class="metismenu-icon"></i>
                                Add Category
                            </a>
                        </li>
                        <li>
                            <a href="{{route('category.index')}}">
                                <i class="metismenu-icon">
                                </i>View Category List
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                    <i class="metismenu-icon fas fa-cubes"></i>
                        Manage Brand
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                    <li>
                            <a href="{{route('brand.create')}}">
                                <i class="metismenu-icon"></i>
                                Add Brand
                            </a>
                        </li>
                        <li>
                            <a href="{{route('brand.index')}}">
                                <i class="metismenu-icon">
                                </i>View Brand List
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                    <i class="metismenu-icon fas fa-truck-loading"></i>
                        Manage Products
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                    <li>
                            <a href="{{route('product.create')}}">
                                <i class="metismenu-icon"></i>
                                Add Product
                            </a>
                        </li>
                        <li>
                            <a href="{{route('product.index')}}">
                                <i class="metismenu-icon">
                                </i>View Product List
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                    <i class="metismenu-icon fas fa-grip-horizontal"></i>
                        Manage Product Type
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                    <li>
                            <a href="{{route('type.create')}}">
                                <i class="metismenu-icon"></i>
                                Add Product Type
                            </a>
                        </li>
                        <li>
                            <a href="{{route('type.index')}}">
                                <i class="metismenu-icon">
                                </i>View Product Type List
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                    <i class="metismenu-icon fas fa-align-right"></i>
                        Manage Requests
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                    <li>
                            <a href="{{route('request.show','Pending')}}">
                                <i class="metismenu-icon"></i>
                                View Pending Requests
                            </a>
                        </li>
                        <li>
                            <a href="{{route('request.show','Accepted')}}">
                                <i class="metismenu-icon">
                                </i>View Accepted Request
                            </a>
                        </li>
                        <li>
                            <a href="{{route('request.show','Rejected')}}">
                                <i class="metismenu-icon">
                                </i>View Rejected Request
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                    <i class="metismenu-icon fas fa-drumstick-bite"></i>
                        Stock Outs
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('product.show',1)}}">
                                <i class="metismenu-icon"></i>
                                View Product List
                            </a>
                        </li>
                        <!-- <li>
                            <a href="{{route('request.show','Accepted')}}">
                                <i class="metismenu-icon">
                                </i>View Accepted Request
                            </a>
                        </li>
                        <li>
                            <a href="{{route('request.show','Rejected')}}">
                                <i class="metismenu-icon">
                                </i>View Rejected Request
                            </a>
                        </li> -->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>