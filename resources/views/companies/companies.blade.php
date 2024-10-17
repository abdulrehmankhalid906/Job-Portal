@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>All</strong> Companies</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('companies.create') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Add New
                </a>
            </div>
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
                            <th>CEO Name</th>
                            <th>Category</th>
                            <th>Company Reg</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->company_name }}</td>
                                <td>{{ $company->users->name }}</td>
                                <td>{{ $company->company_type ?? 'N.A' }}</td>
                                <td>{{ $company->created_at }}</td>
                                <td>
                                    <a href="{{ route('applicants.edit', $company->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil"></i></a>
                                    <form action="{{ route('applicants.destroy', $company->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
{{-- <input id="ajaxRoute" value="{{ route('landmarks.index') }}" hidden /> --}}
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>