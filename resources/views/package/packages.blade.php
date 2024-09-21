@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Packages</h4>
            <div class="flex-shrink-0">
                <a href="{{ route('packages.create') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Create Package
                </a>
            </div>
        </div>

        <div class="row mt-3">
            @foreach ($packages as $package)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <div class="card h-100">

                        <div class="card-header text-center">
                            <h2 class="card-title">{{ $package->title }}</h2>
                        </div>
                        
                        <div class="card-body">
                            <ul>
                                @foreach ($package->details as $detail)
                                    <li>{{ $detail }}</li>
                                @endforeach
                            </ul>
                        </div>
        
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <span class="text-muted">Price: {{ $package->price }}</span>
                            <a class="btn btn-primary" href="{{ route('packages.edit', $package->id) }}">Edit Package</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>