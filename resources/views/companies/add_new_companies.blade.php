@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>All</strong> Companies</h3>
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
                        <div class="col-lg-4">
                            <label for="basiInput" class="form-label">Country</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="col-lg-4">
                            <label for="labelInput" class="form-label">Shortcode</label>
                            <input type="text" class="form-control" id="shortcode" name="shortcode" required>
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
