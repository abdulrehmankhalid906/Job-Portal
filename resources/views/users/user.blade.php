@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>All</strong> Users</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('users.create') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Add New User
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table id="landmarks-data-table" class="table table-bordered table-striped align-middle table-nowrap mb-0" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID(s)</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->roles->implode('name', ', ') }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
@endsection

