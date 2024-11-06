<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon mx-2">
            <i class="fa-solid fa-gauge-high"></i>
        </div>
  Blog Panel
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Blog Management
    </div>

    <!-- Blog Sections Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('blog_sections.*') ? 'active' : '' }}" data-toggle="collapse"
            href="#collapseBlogSections" aria-expanded="false" aria-controls="collapseBlogSections">
            <i class="fa-solid fa-folder"></i>
            <span>Blog Sections</span>
        </a>
        <div id="collapseBlogSections" class="collapse {{ request()->routeIs('blog_sections.*') ? 'show' : '' }}"
            aria-labelledby="headingBlogSections" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('blog_sections.create') ? 'active' : '' }}"
                    href="{{ route('blog_sections.create') }}">Add New Section</a>
                <a class="collapse-item {{ request()->routeIs('blog_sections.index') ? 'active' : '' }}"
                    href="{{ route('blog_sections.index') }}">All Sections</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Blogs Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}" data-toggle="collapse"
            href="#collapseBlogs" aria-expanded="false" aria-controls="collapseBlogs">
            <i class="fa-solid fa-pencil-alt"></i>
            <span>Blogs</span>
        </a>
        <div id="collapseBlogs" class="collapse {{ request()->routeIs('blogs.*') ? 'show' : '' }}"
            aria-labelledby="headingBlogs" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('blogs.create') ? 'active' : '' }}"
                    href="{{ route('blogs.create') }}">Add New Blog</a>
                <a class="collapse-item {{ request()->routeIs('blogs.index') ? 'active' : '' }}"
                    href="{{ route('blogs.index') }}">All Blogs</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Users Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" data-toggle="collapse"
            href="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
            <i class="fa-solid fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse {{ request()->routeIs('users.*') ? 'show' : '' }}"
            aria-labelledby="headingUsers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('users.create') ? 'active' : '' }}"
                    href="{{ route('users.create') }}">Add New User</a>
                <a class="collapse-item {{ request()->routeIs('users.index') ? 'active' : '' }}"
                    href="{{ route('users.index') }}">All Users</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
