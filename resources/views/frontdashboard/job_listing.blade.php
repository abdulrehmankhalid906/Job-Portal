@extends('index')
@section('content')

<div class="container mt-3">
    <div class="row gy-5 gx-4">
        <div class="col-lg-10">
            <div class="">
                <h4 class="mb-4">Post Job</h4>
                <div class="container-xxl py-5" id="jobs">
                    <div class="container">
                        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    @foreach ($company->jobs as $job)
                                        <div class="job-item p-4 mb-4">
                                            <div class="row g-5">
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/images/' .$job->extra_document) }}" alt="" style="width: 80px; height: 80px;">
                                                    <div class="text-start ps-4">
                                                        <h5 class="mb-3">{{ $job->title }}</h5>
                                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->countries->name }},{{ $job->cities->name }}</span>
                                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->job_type }}</span>
                                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary_range }}</span>

                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <small class="text-truncate mb-3"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line:{{ $job->valid_till }}</small>
                                                    <div class="d-flex mb-3">
                                                        {{-- <a class="btn btn-primary" href="{{ route('viewJob', ['id' => $jobs->id, 'title' => $jobs->title]) }}">Apply Now</a> --}}
                                                        <a class="btn btn-primary" href="">Apply Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
