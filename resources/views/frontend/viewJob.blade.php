<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TalentLinker - Explore Jobs</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

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

        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3">{{ $title }}</h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->cities->name }}, {{ $job->countries->name }}</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->job_type }}</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary_range }}</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p>{{ $job->description }}</p>
                            <h4 class="mb-3">Responsibility</h4>
                            <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                            </ul>
                            <h4 class="mb-3">Qualifications</h4>
                            <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                            </ul>
                        </div>

                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form action="{{ route('applyjobs') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $job->id }}" name="job_id" readonly>
                                <input type="hidden" value="{{ $job->companies->id }}" name="company_id" readonly>
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Your Name" id="name" name="name">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" class="form-control" placeholder="Your Email" id="email" name="email">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Portfolio Website" id="portweb" name="portweb">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="file" class="form-control bg-white" id="upload_cv" name="upload_cv">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" placeholder="Coverletter" id="coverletter" name="coverletter"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary w-100" value="Apply Now">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published: {{ $job->created_at->format('d-m-y') }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: 00</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $job->job_type }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ $job->salary_range }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $job->cities->name }},{{ $job->countries->name }}</p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: {{ $job->valid_till }}</p>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>
                            <p class="m-0">{{ $job->companies->company_name }}</p>
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('storage/images/'.$job->companies->company_img) }}" class="img-fluid"></img>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->


        <!-- Footer Start -->
        @include('frontend.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
</body>

</html>
