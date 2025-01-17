<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
    <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.order.index') }}">
            <i class="mdi mdi-sale menu-icon"></i>
            <span class="menu-title">Orders</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-view-list menu-icon"></i>
            <span class="menu-title">Category</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="category">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.create') }}">Add</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.index') }}">List</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-plus-circle menu-icon"></i>
            <span class="menu-title">Products</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="product">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product.create') }}">Add</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product.index') }}">List</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.brand.index') }}">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Brands</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.color.index') }}">
            <i class="mdi mdi-palette menu-icon"></i>
            <span class="menu-title">Colors</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.client.index') }}">
            <i class="mdi mdi-account-multiple-outline menu-icon"></i>
            <span class="menu-title">Clients</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.slider.index') }}">
            <i class="mdi mdi-animation menu-icon"></i>
            <span class="menu-title">Home Slider</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.setting.index') }}">
            <i class="mdi mdi-cogs menu-icon"></i>
            <span class="menu-title">Site Setting</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="mdi mdi-bank menu-icon"></i>
            <span class="menu-title fs-5">HRM</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
            <i class="mdi mdi-account-multiple-plus menu-icon"></i>
            <span class="menu-title">Users</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.project.index') }}">
            <i class="mdi mdi-briefcase-account menu-icon"></i>
            <span class="menu-title">Projects</span>
        </a>
    </li> --}}
</ul>
</nav>