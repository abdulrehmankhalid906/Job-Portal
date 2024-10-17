@extends('layouts.master')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row mb-xl-0">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>Post</strong> Job</h3>
                </div>

                <div class="col-auto ms-auto text-end mt-n1">
                    <a href="{{ route('applicants.index') }}" class="btn btn-success btn-label btn-sm">
                        <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> All Applicants
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('applicants.update', $apply->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-4">Applicant Details</h4>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                                    <div class="alert-icon">
                                        <i class="far fa-fw fa-bell"></i>
                                    </div>
                                    <div class="alert-message">
                                        <strong>Application For !</strong> {{ $apply->jobs->title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-3 col-sm-3">
                                <label for="">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $apply->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-3 col-sm-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $apply->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-6 col-sm-6">
                                <label for="">Portfolio</label>
                                <input type="text" class="form-control @error('portweb') is-invalid @enderror" id="portweb" value="{{ $apply->portweb }}">
                                @error('portweb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-3 col-sm-3">
                                <label for="">Application Date</label>
                                <input type="date" class="form-control @error('valid_till') is-invalid @enderror" placeholder="Valid Till" id="valid_till" value="{{ $apply->created_at->format('Y-m-d') }}">
                                @error('valid_till')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-3 col-sm-3">
                                <label for="">Application Status</label>
                                <select class="form-select form-select-md @error('category_id') is-invalid @enderror" name="status" id="status">
                                    <option value="">Select One</option>
                                    @if(count($statuses) > 0)
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status }}" {{ $apply->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    @endif

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </select>
                            </div>

                            <div class="col-12">
                                <textarea class="form-control @error('coverletter') is-invalid @enderror" rows="10" cols="15" placeholder="Cover Letter" id="coverletter">{{ $apply->coverletter }}</textarea>
                                @error('coverletter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <button class="btn btn-primary w-100" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>