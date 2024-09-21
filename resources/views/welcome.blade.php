<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TalentLinker - Explore Jobs</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">

        @include('frontend.header')

        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">Unlock Your Career Potential and Discover Exceptional Talent with Us</h1>
                        <p class="mb-4">Welcome to TalentLinker, your premier destination for streamlined job connections and efficient talent acquisition. We've created a dynamic platform where companies effortlessly post job opportunities, and users seamlessly apply for their ideal positions. Our user-friendly interface ensures a smooth experience, making it easy for employers to discover top-tier talent and for job seekers to find their dream jobs. Join us and experience a simplified and effective approach to connecting companies with the right candidates and helping professionals advance in their careers.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>User-Friendly Job Posting</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Seamless Application Process</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Efficient Talent Discovery</p>
                        {{-- <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a> --}}
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="{{ asset('frontend/img/about-1.jpg') }}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="{{ asset('frontend/img/about-2.jpg') }}" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="{{ asset('frontend/img/about-3.jpg') }}" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="{{ asset('frontend/img/about-4.jpg') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.category')

        @include('frontend.search')

        <!-- Jobs Start -->
        <div class="container-xxl py-5" id="jobs">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            {{-- @dump($jobdata); --}}
                            @foreach ($jobdata as $jobs)
                                <div class="job-item p-4 mb-4" style="background-color: {{ $jobs->highlight_post == '1' ? '#e9e9e9' : '' }}">
                                    <div class="row g-5">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/images/'. $jobs->extra_document) }}" alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">{{ $jobs->title }}</h5>
                                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobs->countries->name }}, {{ $jobs->cities->name }}</span>
                                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $jobs->job_type }}</span>
                                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $jobs->salary_range }}</span>

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <small class="text-truncate mb-3"><i class="far fa-calendar-alt text-primary me-2"></i>Deadline: {{ $jobs->valid_till }} - Applicants: {{ $jobs->applies->count() }}</small>

                                            <div class="d-flex mb-3">
                                                <a class="btn btn-primary" href="{{ route('viewJob', ['slug'=> $jobs->slug, 'id'=>$jobs->id]) }}">Apply Now</a>


                                                {{-- <a class="btn btn-primary" href="{{ route('viewJob', $jobs->title) }}">Share Link</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial Start -->
        @include('frontend.testimonial')
        
        @include('frontend.overall_rating')
        
        <h1 class="text-center mt-5">Our Packages</h1>
        @include('frontend.packages')
        
        <!-- Footer Start -->
        @include('frontend.footer')

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

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
