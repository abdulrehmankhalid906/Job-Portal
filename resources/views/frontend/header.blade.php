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
            <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
        </div>
    </div>
</nav>
