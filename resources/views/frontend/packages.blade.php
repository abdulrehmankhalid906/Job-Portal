<div class="row justify-content-center mt-5">
    @foreach ($packages as $package)
        <div class="col-lg-3 col-md">
            <div class="card text-center single-pricing-pack py-5 px-2" style="border: 1px solid #00B074;">
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
                    {{-- @auth --}}
                        <a class="btn btn-primary" href="{{ route('packages.edit', $package->id) }}">Edit Package</a>
                    {{-- @else --}}
                        <a class="btn btn-success" href="{{ route('packages.edit', $package->id) }}">Buy Package</a>
                    {{-- @endauth --}}
                </div>
            </div>
        </div>
    @endforeach
</div>