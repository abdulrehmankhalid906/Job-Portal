@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>All</strong> Packages</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('packages.create') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Create Package
                </a>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            @include('frontend.packages')
        </div>
    </div>
</main>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>