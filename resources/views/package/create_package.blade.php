@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Create</strong> Package</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
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
                                @foreach ($packages as $package)
                                    <option value="{{ $package }}">{{ $package }}</option>
                                @endforeach
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
</main>
@endsection