@extends('frontend.master')
@section('content')
<div class="container mb-2">
    <h1 class="text-center">View Profile</h1>
    <form method="post">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-outline mb-4">
                    <label class="form-label">Name</label>
                    <input type="text" id="title" class="form-control" value="{{ $users->name }}" disabled/>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-outline mb-4">
                    <label class="form-label">Email</label>
                    <input type="text" id="title" class="form-control" value="{{ $users->email }}" disabled/>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
