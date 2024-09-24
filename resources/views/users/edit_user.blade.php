@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-header">
            <h4 class="card-title mb-0 flex-grow-1">Edit User</h4>
            <div class="flex-shrink-0">
                <a href="{{ route('users.index') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> All User
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Roles</label>
                        <select name="role_id" class="form-control">
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ $selected_role == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
