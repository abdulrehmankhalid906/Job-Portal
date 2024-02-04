@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">General Profile</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('postJob') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4 col-sm-4">
                            <label for="">Registered Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="">
                        </div>

                        <div class="col-4 col-sm-4">
                            <label for="">Registered Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="">
                        </div>

                        <div class="col-4 col-sm-4">
                            <label for="">Old Password</label>
                            <input type="password" class="form-control" name="old_password" id="old_password" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 col-sm-4">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="">
                        </div>

                        <div class="col-4 col-sm-4">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="">
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
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Company Profile</h4>
        </div>

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
                            <input type="text" class="form-control" name="email" id="email" value="{{ $users->company->founded_date ?? '' }}">
                        </div>

                        <div class="col-3 col-sm-3">
                            <label for="">Total Employees</label>
                            <input type="text" class="form-control" name="old_password" id="old_password" value="{{ $users->company->employees_no ?? '' }}">
                        </div>

                        <div class="col-3 col-sm-3">
                            <label for="">Company Type</label>
                            <input type="text" class="form-control" name="password" id="password" value="" value="{{ $users->company->company_type ?? '' }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 col-sm-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control" name="password" id="password" value="">
                        </div>

                        <div class="col-3 col-sm-3">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="password" id="password" value="">
                        </div>

                        <div class="col-3 col-sm-3">
                            <label for="">Company Image</label>
                            <input type="file" class="form-control" name="company_img" id="company_img" value="">
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
    </div>
</div>
{{-- <input id="ajaxRoute" value="{{ route('landmarks.index') }}" hidden /> --}}
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
