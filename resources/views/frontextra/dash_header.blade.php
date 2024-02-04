<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('frontHome') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">TalentLinker</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('frontHome') }}" class="nav-item nav-link active">Home</a>
            <a href="#jobs" class="nav-item nav-link">Jobs</a>
            <a href="#contact" class="nav-item nav-link">Contact</a>

            @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('frontend/img/com-logo-1.jpg') }}" alt="User Avatar" class="img-fluid rounded-circle" style="width:35px; height:35px;">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            @endif

            @if(!Auth::check())
                <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
            @endif
        </div>

        @if(Auth::check())
        <a href="{{ route('postJob') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
        @endif
    </div>
</nav>
