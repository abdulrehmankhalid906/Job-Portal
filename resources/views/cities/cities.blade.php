@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>All</strong> Cities</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('cities.create') }}" class="btn btn-success btn-label btn-sm">
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

                        </select>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                        <select class="form-select form-control" id="cityId">
                            <option value="">Select City</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                        <select class="form-select form-control" id="categoryId">
                            <option value="">Select Category</option>

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
                <table id="cities-data-table" class="table table-bordered table-striped align-middle table-nowrap mb-0" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<input id="ajaxRoute" value="{{ route('cities.index') }}" hidden/>
@endsection