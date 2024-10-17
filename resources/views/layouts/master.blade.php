<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('admin/assets/img/icons/icon-48x48.png') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Admin Dashboard</title>

    <link href="{{ asset('admin/assets/css/light.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('admin/assets/js/settings.js') }}"></script> --}}

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        @include('layouts.sidebar')

        <div class="main">
            @include('layouts.header')

            @yield('content')

            @include('layouts.footer')
        </div>
    </div>

    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#country_id').change(function(){
                var cunt_id = $('#country_id').val();
                var options = '';
        
                $.ajax({
                    url: "{{ route('cityData') }}",
                    type: "GET",
                    dataType: 'JSON',
                    data:
                        {
                        country_id:cunt_id
                    },
                    cache: false,
                    success: function(resp)
                    {
                        for(let index = 0; index < resp.length; index++)
                        {
                            options += `<option value="${resp[index].id}">${resp[index].name}</option>`;
                        }
        
                        $('#city_id').html(options);
        
                    },
        
                    error: function()
                    {
        
                    },
                });
            });
        });
    </script>

</body>
</html>
