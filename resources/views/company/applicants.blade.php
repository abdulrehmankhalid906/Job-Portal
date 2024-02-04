@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Applicants</h4>
        </div>

        {{-- <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                        <select class="form-select form-control" id="countryId">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }} - {{ $country->shortcode }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                        <select class="form-select form-control" id="cityId">
                            <option value="">Select City</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                        <button type="button" class="btn btn-primary" id="searchBtttn">Search</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="card">
            <div class="card-body">
                <table id="landmarks-data-table" class="table table-bordered table-striped align-middle table-nowrap mb-0" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID(s)</th>
                            <th>Company Name</th>
                            <th>Applicants Name</th>
                            <th>Category</th>
                            <th>Company Reg</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->company_name }}</td>
                                <td>{{ $company->users->name }}</td>
                                <td>{{ $company->company_type ?? 'N.A' }}</td>
                                <td>{{ $company->created_at }}</td>
                                <td>Action</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <input id="ajaxRoute" value="{{ route('landmarks.index') }}" hidden /> --}}
@endsection
