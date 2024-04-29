@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Create Permission</h4>
            <div class="flex-shrink-0">
                <a href="{{ route('permissions.index') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> All Permissions
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="basiInput" class="form-label">Permission Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <input type="submit" class="btn btn rounded-pill btn-primary waves-effect waves-light" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
