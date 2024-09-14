@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Manage Permissions</h4>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Role: {{ $role->name }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.update.permission', $role->id) }}" method="post">
                            @csrf
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission->name }}" @if(in_array($permission->name, $selected_permissions)) checked @endif>
                                        <label class="form-check-label">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row">
                                <div class="col-lg-3 mt-3">
                                    <div class="d-grid">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection