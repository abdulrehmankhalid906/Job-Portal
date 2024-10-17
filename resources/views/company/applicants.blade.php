@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>All</strong> Applicants</h3>
            </div>
        </div>

        {{-- <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                        <select class="form-select form-control" id="countryId">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }} - {{ $country->shortcode }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                        <select class="form-select form-control" id="cityId">
                            <option value="">Select City</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                        <button type="button" class="btn btn-primary" id="searchBtttn">Search</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="card">
            <div class="card-body">
                <table id="landmarks-data-table" class="table table-bordered table-striped align-middle table-nowrap mb-0" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID(s)</th>
                            <th>Title</th>
                            <th>Applicants Name</th>
                            <th>Status</th>
                            <th>Apply Type</th>
                            <th>Application Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applies as $apply)
                            <tr>
                                <td>{{ $apply->id }}</td>
                                <td>{{ $apply->jobs->title }}</td>
                                <td>{{ $apply->name }}</td>
                                <td>{{ $apply->status }}</td>
                                <td>{{ $apply->apply_type ?? 'N.A' }}</td>
                                <td>{{ $apply->created_at }}</td>
                                <td>
                                    <a href="{{ route('applicants.edit', $apply->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil"></i></a>
                                    <form action="{{ route('applicants.destroy', $apply->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
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
