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
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Revenue</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart align-middle"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">$20.120</h1>
                            <div class="mb-0">
                                <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 2.35% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Browser Usage</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="py-3">
                                    <div class="chart chart-xs">
                                        <canvas id="chartjs-dashboard-pie"></canvas>
                                    </div>
                                </div>

                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Chrome</td>
                                            <td class="text-end">4306</td>
                                        </tr>
                                        <tr>
                                            <td>Firefox</td>
                                            <td class="text-end">3801</td>
                                        </tr>
                                        <tr>
                                            <td>IE</td>
                                            <td class="text-end">1689</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Real-Time</h5>
                        </div>
                        <div class="card-body px-4">
                            <div id="world_map" style="height:350px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Calendar</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="chart">
                                    <div id="datetimepicker-dashboard"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-12 col-lg-12 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Latest Projects</h5>
                        </div>
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="d-none d-xl-table-cell">Start Date</th>
                                    <th class="d-none d-xl-table-cell">End Date</th>
                                    <th>Status</th>
                                    <th class="d-none d-md-table-cell">Assignee</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Project Apollo</td>
                                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="badge bg-success">Done</span></td>
                                    <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                                </tr>
                                <tr>
                                    <td>Project Fireball</td>
                                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="badge bg-danger">Cancelled</span></td>
                                    <td class="d-none d-md-table-cell">William Harris</td>
                                </tr>
                                <tr>
                                    <td>Project Hades</td>
                                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="badge bg-success">Done</span></td>
                                    <td class="d-none d-md-table-cell">Sharon Lessman</td>
                                </tr>
                                <tr>
                                    <td>Project Nitro</td>
                                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="badge bg-warning">In progress</span></td>
                                    <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                                </tr>
                                <tr>
                                    <td>Project Phoenix</td>
                                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="badge bg-success">Done</span></td>
                                    <td class="d-none d-md-table-cell">William Harris</td>
                                </tr>
                                <tr>
                                    <td>Project X</td>
                                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="badge bg-success">Done</span></td>
                                    <td class="d-none d-md-table-cell">Sharon Lessman</td>
                                </tr>
                                <tr>
                                    <td>Project Romeo</td>
                                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="badge bg-success">Done</span></td>
                                    <td class="d-none d-md-table-cell">Christina Mason</td>
                                </tr>
                                <tr>
                                    <td>Project Wombat</td>
                                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="badge bg-warning">In progress</span></td>
                                    <td class="d-none d-md-table-cell">William Harris</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Monthly Sales</h5>
                        </div>
                        <div class="card-body d-flex w-100">
                            <div class="align-self-center chart chart-lg">
                                <canvas id="chartjs-dashboard-bar"></canvas>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>
@endsection
