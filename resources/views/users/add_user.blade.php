@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-header">
            <h4 class="card-title mb-0 flex-grow-1">Add User</h4>
            <div class="flex-shrink-0">
                <a href="{{ route('users.index') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> All User
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Roles</label>
                        <select class="form-select" name="role">
                            <option value="">Select One</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                {{-- When we use => <option value="{{ $role->id }}">{{ $role->name }}</option> --}}
                                {{-- There is no role named `1` for guard `web`. --}}
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
