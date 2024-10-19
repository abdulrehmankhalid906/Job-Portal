@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Edit</strong> Comapny</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('companies.index') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> View All
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('companies.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="basiInput" class="form-label">CEO Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $company->company_name ?? '' }}">
                        </div>

                        <div class="col-lg-3">
                            <label for="basiInput" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $company->company_name ?? '' }}">
                        </div>

                        <div class="col-lg-3">
                            <label for="labelInput" class="form-label">Founded Date</label>
                            <input type="date" class="form-control" id="shortcode" name="shortcode" value="{{ $company->founded_date ?? '' }}">
                        </div>
                        
                        <div class="col-lg-3">
                            <label for="">Total Employees</label>
                            <input type="text" class="form-control" name="employees_no" id="employees_no" value="{{ $company->employees_no ?? '' }}">
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-3 col-sm-3">
                            <label for="">Company Type</label>
                            <input type="text" class="form-control" name="company_type" id="company_type" value="{{ $company->company_type ?? '' }}">
                        </div>
                        
                        <div class="col-3 col-sm-3">
                            <label for="">Company Country</label>
                            <select class="form-select form-control" id="country_id" name="country_id">
                                <option value="">Select One</option>
                                {{-- @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }} - {{ $country->shortcode }}</option>
                                @endforeach --}}
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

                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <input type="submit" class="btn btn rounded-pill btn-primary waves-effect waves-light" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
{{-- <input id="ajaxRoute" value="{{ route('landmarks.index') }}" hidden /> --}}
@endsection


@push('header_scripts')
@endpush
