@extends('layouts.master')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-0">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>All</strong> Roles</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('roles.create') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Add New Role
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
                            <th>Permissions</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->permissions->implode('name', ', ') }}</td>
                            <td>{{ $role->created_at }}</td>
                            <td>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil"></i></a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                                <a href="{{ route('role.assign.permission', $role->id) }}" title="Assign Permission" class="btn btn-info btn-sm"><i class="fas fa-users-cog"></i></a>

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
