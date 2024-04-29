@extends('layouts.master')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>Analytics</strong> Dashboard</h3>
                </div>

                <div class="col-auto ms-auto text-end mt-n1">
                    <a href="{{ route('frontHome') }}" class="btn btn-primary" target="_blank">Frontpage</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Registered Companies</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign align-middle"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $companies }}</h1>
                            <div class="mb-0">
                                <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 3.65% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Posted Jobs</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag align-middle"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $jobs }}</h1>
                            <div class="mb-0">
                                <span class="badge badge-danger-light"> <i class="mdi mdi-arrow-bottom-right"></i> -5.25% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Jobs Candidates</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity align-middle"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $users }}</h1>
                            <div class="mb-0">
                                <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 4.65% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
