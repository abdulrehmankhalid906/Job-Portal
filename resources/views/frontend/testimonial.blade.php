<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="text-center mb-5">Our Clients Say!!!</h1>
        <div class="owl-carousel testimonial-carousel">
            {{-- @dump($testimonials) --}}
            @foreach ($testimonials as $testimonial)
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>{{ $testimonial->feedback }}</p>
                    <div class="rating mb-3 text-center">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star{{ $i <= $testimonial->rating ? '' : '-o' }}" style="color: #FFD700;"></i>
                        @endfor
                    </div>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">{{ $testimonial->company->company_name }}</h5>
                            <small>{{ $testimonial->company->company_type ?? 'Updating...' }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
