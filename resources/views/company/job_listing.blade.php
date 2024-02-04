@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Job Listings</h4>
            <div class="flex-shrink-0">
                <a href="{{ route('postJob') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Add New
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            @foreach ($company->jobs as $job)
                                <div class="job-item p-4 mb-4" style="border: .5px solid black;">
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
{{-- <input id="ajaxRoute" value="{{ route('landmarks.index') }}" hidden /> --}}
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $('#country_id').change(function(){
            var cunt_id = $('#country_id').val();
            var options = '';

            $.ajax({
                url: "{{ route('cityData') }}",
                type: "GET",
                dataType: 'JSON',
                data:
                    {
                    country_id:cunt_id
                },
                cache: false,
                success: function(resp)
                {
                    for(let index = 0; index < resp.length; index++)
                    {
                        options += `<option value="${resp[index].id}">${resp[index].name}</option>`;
                    }

                    $('#city_id').html(options);

                },

                error: function()
                {

                },
            });
        });
    });
</script>
