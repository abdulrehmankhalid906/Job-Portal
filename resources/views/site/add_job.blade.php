@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Set Site</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('site.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-6 col-sm-6">
                            <label for="">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 col-sm-6">
                            <label for="">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-12 col-sm-6">
                            <label for="">Extra Documents</label>
                            <input type="file" class="form-control bg-white @error('extra_document') is-invalid @enderror" name="extra_document" id="extra_document">
                            @error('extra_document')
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
</div>
{{-- <input id="ajaxRoute" value="{{ route('landmarks.index') }}" hidden /> --}}
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>