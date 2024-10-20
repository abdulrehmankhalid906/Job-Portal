@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Setup</strong> Profile</h3>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4 col-sm-4">
                            <label for="">Registered Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $users->name ?? '' }}">
                        </div>

                        <div class="col-4 col-sm-4">
                            <label for="">Registered Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $users->email ?? '' }}">
                        </div>

                        <div class="col-4 col-sm-4">
                            <label for="">Old Password</label>
                            <input type="password" class="form-control" name="old_password" id="old_password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 col-sm-4">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>

                        <div class="col-4 col-sm-4">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-4 col-sm-4">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (auth()->user()->hasRole('Company'))
        <div class="card">
            <div class="card-body">
                <form action="{{ route('updateCompany') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3 col-sm-3">
                            <label for="">Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $users->company->company_name ?? '' }}">
                        </div>

                        <div class="col-3 col-sm-3">
                            <label for="">Founded Date</label>
                            <input type="date" class="form-control" name="founded_date" id="founded_date" value="{{ $users->company->founded_date ?? '' }}">
                        </div>

                        <div class="col-3 col-sm-3">
                            <label for="">Total Employees</label>
                            <input type="text" class="form-control" name="employees_no" id="employees_no" value="{{ $users->company->employees_no ?? '' }}">
                        </div>

                        <div class="col-3 col-sm-3">
                            <label for="">Company Type</label>
                            <input type="text" class="form-control" name="company_type" id="company_type" value="{{ $users->company->company_type ?? '' }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 col-sm-3">
                            <label for="">Company Country</label>
                            <select class="form-select form-control" id="country_id" name="country_id">
                                <option value="">Select One</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }} - {{ $country->shortcode }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3 col-sm-3">
                            <label for="">Company City</label>
                            <select class="form-select form-control" id="city_id" name="city_id">
                                <option value="">Select One</option>
                            </select>
                        </div>

                        <div class="col-3 col-sm-3">
                            <label for="">Company Image</label>
                            <input type="file" class="form-control" name="company_img" id="company_img">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</main>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>