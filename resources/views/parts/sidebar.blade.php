<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"
                            srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                @if (auth()->user()->is_admin)
                    {{-- Admin --}}

                    <li class="sidebar-title">Dashboard</li>

                    <li class="sidebar-item  has-sub" id="category">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Category</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item" id="category_create">
                                <a href="{{ route('admin.category.create') }}">Add</a>
                            </li>
                            <li class="submenu-item" id="category_index">
                                <a href="{{ route('admin.category.index') }}">Categories</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub" id="product">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Product</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item" id="product_create">
                                <a href="{{ route('admin.product.create') }}">Add</a>
                            </li>
                            <li class="submenu-item" id="product_index">
                                <a href="{{ route('admin.product.index') }}">Products</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub" id="user">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>User</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item" id="user_create">
                                <a href="{{ route('admin.user.create') }}">Add</a>
                            </li>
                            <li class="submenu-item" id="user_index">
                                <a href="{{ route('admin.user.index') }}">Users</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item" id="sales">
                        <a href="{{route('admin.sale.index')}}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Sales</span>
                        </a>
                    </li>
                @endif

                {{-- User --}}
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item" id="home">
                    <a href="{{route('home')}}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Market</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
