<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('home') }}">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                General
            </li>

           <li class="sidebar-item {{ setRoute('home') }}">
                <a class="sidebar-link" href="{{ route('home') }}">
                    <i class="align-middle" data-feather="monitor"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ setRoute('site.create') }}">
                <a class="sidebar-link" href="{{ route('site.create') }}">
                    <i class="align-middle" data-feather="settings"></i> <span
                        class="align-middle">Site Management</span>
                </a>
            </li>

            {{-- <li class="sidebar-header">
                Module Enhancer
            </li>

            <li class="sidebar-item {{ setRoute('category.index') }}">
                <a class="sidebar-link" href="{{ route('category.index') }}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">The Category</span>
                </a>
            </li>

            <li class="sidebar-item {{ setRoute('countries.index') }}">
                <a class="sidebar-link" href="{{ route('countries.index') }}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">The Country</span>
                </a>
            </li>

            <li class="sidebar-item {{ setRoute('cities.index') }}">
                <a class="sidebar-link" href="{{ route('cities.index') }}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">The City</span>
                </a>
            </li> --}}

            <li class="sidebar-header">
                Company Modules
            </li>

            <li class="sidebar-item {{ setRoute('jobs.create') }}">
                <a class="sidebar-link" href="{{ route('jobs.create') }}">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Post Job</span>
                </a>
            </li>

            <li class="sidebar-item {{ setRoute('jobs.index') }}">
                <a class="sidebar-link" href="{{ route('jobs.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Posted Jobs</span>
                </a>
            </li>

            <li class="sidebar-item {{ setRoute('applicants.index') }}">
                <a class="sidebar-link" href="{{ route('applicants.index') }}">
                    <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Job Applicants</span>
                </a>
            </li>

            <li class="sidebar-item {{ setRoute('testimonials.create') }}">
                <a class="sidebar-link" href="{{ route('testimonials.create') }}">
                    <i class="align-middle" data-feather="star"></i> <span class="align-middle">Give Feedback</span>
                </a>
            </li>


            <li class="sidebar-header">
                Enhancers & Modules
            </li>

            <li class="sidebar-item {{ setRoute('packages.index') }}">
                <a class="sidebar-link" href="{{ route('packages.index') }}">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Packages</span>
                </a>
            </li>

            <li class="sidebar-item {{ setRoute('users.index') }}">
                <a class="sidebar-link" href="{{ route('users.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                </a>
            </li>

            <li class="sidebar-item {{ setRoute('roles.index') }}">
                <a class="sidebar-link" href="{{ route('roles.index') }}">
                    <i class="align-middle" data-feather="lock"></i> <span class="align-middle">Roles</span>
                </a>
            </li>

            <li class="sidebar-item {{ setRoute('permissions.index') }}">
                <a class="sidebar-link" href="{{ route('permissions.index') }}">
                    <i class="align-middle" data-feather="shield"></i> <span class="align-middle">Permissions</span>
                </a>
            </li>

            <li class="sidebar-item {{ setRoute('companies.index') }}">
                <a class="sidebar-link" href="{{ route('companies.index') }}">
                    <i class="align-middle" data-feather="slack"></i> <span class="align-middle">Companies</span>
                </a>
            </li>

            {{-- <li class="sidebar-item {{ setRoute('cities.index') }}">
                <a class="sidebar-link" href="{{ route('cities.index') }}">
                    <i class="align-middle" data-feather="check-square"></i> <span
                        class="align-middle">City</span>
                </a>
            </li> --}}

            {{-- <li class="sidebar-header">
                Plugins & Addons
            </li>

            <li class="sidebar-item {{ setRoute('testimonials.index') }}">
                <a class="sidebar-link" href="{{ route('testimonials.index') }}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Testimonial</span>
                </a>
            </li> --}}

        </ul>
    </div>
</nav>
