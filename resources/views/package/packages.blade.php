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

        <div class="row justify-content-center mt-5">
            @foreach ($packages as $package)
                <div class="col-lg-3 col-md">
                    <div class="card text-center single-pricing-pack py-5 px-2" style="border: 1px solid blue;">
                        <h2 class="mb-2">{{ $package->name }}</h2>
                        <div class="card-body p-0">
                            @php
                                $package_decode = json_decode($package->features);
                            @endphp
                            <ul class="list-unstyled text-md pricing-feature-list">
                                @foreach ($package_decode as $detail)
                                    <li>{{ $detail }}</li>
                                @endforeach
                            </ul>
                            <div class="py-4 border-0 pricing-header">
                                <div class="h1 text-center mb-0 color-secondary"><span class="price font-weight-bolder"><small>USD {{ $package->price }}</small></span></div>
                            </div>
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