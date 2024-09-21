@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Create Package</h4>
            <div class="flex-shrink-0">
                <a href="{{ route('packages.index') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> All Packages
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('packages.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row g-3">
                        <div class="col-6 col-sm-4">
                            <label for="">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 col-sm-4">
                            <label for="">Price</label>
                            <input type="number" min="1" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" id="price">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 col-sm-4">
                            <label for="">Duration</label>
                            <div class="input-group mb-3">
                                <input type="number" min="1" step="1" class="form-control @error('duration') is-invalid @enderror" name="duration" id="duration" aria-label="duration" aria-describedby="basic-addon1">
                                <span class="input-group-text" id="basic-addon1">Days</span>
                            </div>
                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="">Description</label>
                            <select class="form-select" multiple aria-label="multiple select example"  name="features[]" id="features">
                                <option value="">Open this select menu</option>
                                <option value="Manage Profile / Dashborad">Manage Profile / Dashborad</option>
                                <option value="My Products">My Products</option>
                                <option value="My Inquiries">My Inquiries</option>
                                <option value="My Bookings">My Bookings</option>
                                <option value="Micro Page">Micro Page</option>
                                <option value="B2B Marketplace (Buyer)">B2B Marketplace (Buyer)</option>
                            </select>                            
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <button class="btn btn-primary w-100" type="submit">Post Job</button>
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