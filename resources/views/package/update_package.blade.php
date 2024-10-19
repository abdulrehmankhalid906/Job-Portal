@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Edit</strong> Package</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('packages.index') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> All Packages
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('packages.update', $package->id) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="row g-3">
                        <div class="col-6 col-sm-4">
                            <label for="">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $package->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 col-sm-4">
                            <label for="">Price</label>
                            <input type="number" min="1" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ $package->price }}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 col-sm-4">
                            <label for="">Duration</label>
                            <div class="input-group mb-3">
                                <input type="number" min="1" step="1" class="form-control @error('duration') is-invalid @enderror" value="{{ $package->duration }}" name="duration" id="duration" aria-label="duration" aria-describedby="basic-addon1">
                                <span class="input-group-text" id="basic-addon1">Days</span>
                            </div>
                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @php
                            $features = json_decode($package->features);
                        @endphp

                        <div class="col-12">
                            <label for="">Description</label>
                            <select class="form-select" multiple aria-label="multiple select example" name="features[]" id="features">
                                <option value="">Open this select menu</option>
                                <option value="Manage Profile / Dashboard" {{ is_array($features) && in_array('Manage Profile / Dashboard', $features) ? 'selected' : '' }}>Manage Profile / Dashboard</option>
                                <option value="My Products" {{ is_array($features) && in_array('My Products', $features) ? 'selected' : '' }}>My Products</option>
                                <option value="My Inquiries" {{ is_array($features) && in_array('My Inquiries', $features) ? 'selected' : '' }}>My Inquiries</option>
                                <option value="My Bookings" {{ is_array($features) && in_array('My Bookings', $features) ? 'selected' : '' }}>My Bookings</option>
                                <option value="Micro Page" {{ is_array($features) && in_array('Micro Page', $features) ? 'selected' : '' }}>Micro Page</option>
                                <option value="B2B Marketplace (Buyer)" {{ is_array($features) && in_array('B2B Marketplace (Buyer)', $features) ? 'selected' : '' }}>B2B Marketplace (Buyer)</option>
                            </select>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <button class="btn btn-primary w-100" type="submit">Update Package</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>