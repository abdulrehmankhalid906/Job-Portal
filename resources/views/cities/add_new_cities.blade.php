@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>All</strong> Cities</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('cities.index') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> View All
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('cities.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="basiInput" class="form-label">Choose Country</label>
                            <select class="form-select mb-3" aria-label="Default select example"  id="country_id" name="country_id" required>
                                <option selected>Select one</option>
                                @foreach ($countries as $country)
                                    <option value={{ $country->id }}>{{ $country->name }} - {{ $country->shortcode }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="labelInput" class="form-label">City</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter city name">
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
@endsection

@push('header_scripts')
@endpush
