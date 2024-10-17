@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Testimonials</strong> Listing</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('testimonials.index') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Add New(CLOSED)
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table id="landmarks-data-table" class="table table-bordered table-striped align-middle table-nowrap mb-0" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID(s)</th>
                            <th>Company</th>
                            <th>Category</th>
                            <th>Feedback</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonial as $testimonial)
                            <tr>
                                <td>{{ $testimonial->id }}</td>
                                <td>{{ $testimonial->company->company_name }}</td>
                                <td>{{ $testimonial->company->company_type ?? 'N.A'}}</td>
                                <td>{{ $testimonial->feedback }}</td>
                                <td>{{ $testimonial->rating }}</td>
                                <td>Action</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
{{-- <input id="ajaxRoute" value="{{ route('landmarks.index') }}" hidden /> --}}
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
