@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Edit</strong> Job</h3>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-6 col-sm-6">
                            <label for="">Job Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $job->title }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 col-sm-6">
                            <label for="">Job Category</label>
                            <select class="form-select form-select-md @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                <option value="">Select One</option>
                                @if(count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $job->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                @endif

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>

                        <div class="col-6 col-sm-6">
                            <label for="">Select Country</label>
                            <select class="form-select form-select-md @error('country_id') is-invalid @enderror" name="country_id" id="country_id">
                                <option value="">Select One</option>
                                @if(count($countries) > 0)
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ $job->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                @endif

                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>

                        <div class="col-6 col-sm-6">
                            <label for="">Select City</label>
                            <select class="form-select form-select-md @error('city_id') is-invalid @enderror" name="city_id" id="city_id">
                                <option value="">Select One</option>
                                @if(count($cities) > 0)
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ $job->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                    @endforeach
                                @endif

                                @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>

                        <div class="col-6 col-sm-6">
                            <label for="">Position Level</label>
                            <select class="form-select form-select-md @error('position_level') is-invalid @enderror" name="position_level" id="position_level">
                                <option value="">Select One</option>
                                @if(count($positions) > 0)
                                    @foreach ($positions as $position)
                                        <option value="{{ $position }}" {{ $job->position_level == $position ? 'selected' : '' }}>{{ $position }}</option>
                                    @endforeach
                                @endif

                                @error('position_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Job Type</label>
                            <select class="form-select form-select-md @error('job_type') is-invalid @enderror" name="job_type" id="job_type">
                                <option value="">Select One</option>
                                @if(count($types) > 0)
                                    @foreach ($types as $type)
                                        <option value="{{ $type }}" {{ $job->job_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                @endif

                                @error('job_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Salary Range</label>
                            <select class="form-select form-select-md @error('salary_range') is-invalid @enderror" name="salary_range" id="salary_range">
                                <option value="">Select One</option>
                                @if(count($ranges) > 0)
                                    @foreach ($ranges as $range)
                                        <option value="{{ $range }}" {{ $job->salary_range == $range ? 'selected' : '' }}>{{ $range }}</option>
                                    @endforeach
                                @endif
                            </select>

                            @error('salary_range')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Valid Till</label>
                            <input type="date" class="form-control @error('valid_till') is-invalid @enderror" placeholder="Valid Till" name="valid_till" id="valid_till" value="{{ $job->valid_till }}">
                            @error('valid_till')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <label for="">Boost Post</label>
                            <div>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="boost_post" value="Yes" {{ isset($job->highlight_post) && $job->highlight_post == 1 ? 'checked' : '' }}>
                                    <span class="form-check-label">Yes</span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="boost_post" value="No" {{ isset($job->highlight_post) && $job->highlight_post == 0 ? 'checked' : '' }}>
                                    <span class="form-check-label">No</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Roles & Responsibilites" name="description" id="description">{{ $job->description }}</textarea>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.js"></script>
<script>
    $(document).ready(function(){
        var editor = new Jodit("#description");
    });
 </script>
