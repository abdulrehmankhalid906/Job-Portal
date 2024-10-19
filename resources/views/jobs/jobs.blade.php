@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Job</strong> Listings</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('jobs.create') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Add New
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        @foreach ($jobs as $job)
                            <div class="job-item p-4 mb-4" style="border: .5px solid black; background-color: {{ $job->highlight_post == '1' ? '#e9e9e9' : '' }}">
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
                                        <small class="text-truncate mb-3"><i class="far fa-calendar-alt text-primary me-2"></i>Deadline:{{ $job->valid_till }}</small>
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-primary" href="{{ route('jobs.edit',$job->id) }}">Edit Job</a> &nbsp;
                                            <a class="btn btn-secondary" href="{{ route('viewJob', ['id' => $job->id, 'slug' => $job->slug]) }}">View Job</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {!! $jobs->links() !!}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
