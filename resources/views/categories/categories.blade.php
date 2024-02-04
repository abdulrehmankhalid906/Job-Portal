@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Categories</h4>
            <div class="flex-shrink-0">
                <a href="{{ route('category.create') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Add New
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
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>Action</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <input id="ajaxRoute" value="{{ route('landmarks.index') }}" hidden /> --}}
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script>
    $(document).ready(function(){
        $('#countryId').change(function(){
            var countryId = $('#countryId').val();

            var options = '';

            $.ajax({
                url: "{{ route('fetch-country') }}",
                type: "GET",
                dataType: 'JSON',
                data:
                {
                    countryId : countryId
                },
                headers:
                {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                cache: false,
                success: function(resp) {
                for(let index = 0; index < resp.length; index++) {
                    options += `<option value="${resp[index].id}">${resp[index].name}</option>`;
                }
                $('#cityId').html(options);

                },
                error: function() {

                },
                beforeSend: function() {

                },
                complete: function() {

                }
            });
        });
    });
</script> --}}
