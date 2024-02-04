@extends('layouts.master')

@section('content')
<style>
    .rating{
	direction: rtl;
	unicode-bidi: bidi-override;
	color: #ddd; /* Personal choice */
    }
    .rating input {
        display: none;
    }
    .rating label:hover,
    .rating label:hover ~ label,
    .rating input:checked + label,
    .rating input:checked + label ~ label {
        color: #ffc107; /* Personal color choice. Lifted from Bootstrap 4 */
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Feedback</h4>
            <div class="flex-shrink-0">
                {{-- <a href="{{ route('category.create') }}" class="btn btn-success btn-label btn-sm">
                    <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Add New
                </a> --}}
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @if($user->testimonials && $user->testimonials->rating > 0)
                    <div class="rate-info mt-2 d-flex flex-column">
                        <h3 class="card-title ms-3">Thank You For Feedback!</h3>
                        <div class="rating" style="width: 20rem">
                            <input id="rating-5" type="radio" name="rating" value="5" {{ $user->testimonials->rating == 5 ? 'checked disabled' : 'disabled' }} /><label for="rating-5"><i class="fas fa-3x fa-star"></i></label>
                            <input id="rating-4" type="radio" name="rating" value="4" {{ $user->testimonials->rating == 4 ? 'checked disabled' : 'disabled' }} /><label for="rating-4"><i class="fas fa-3x fa-star"></i></label>
                            <input id="rating-3" type="radio" name="rating" value="3" {{ $user->testimonials->rating == 3 ? 'checked disabled' : 'disabled' }} /><label for="rating-3"><i class="fas fa-3x fa-star"></i></label>
                            <input id="rating-2" type="radio" name="rating" value="2" {{ $user->testimonials->rating == 2 ? 'checked disabled' : 'disabled' }} /><label for="rating-2"><i class="fas fa-3x fa-star"></i></label>
                            <input id="rating-1" type="radio" name="rating" value="1" {{ $user->testimonials->rating == 1 ? 'checked disabled' : 'disabled' }} /><label for="rating-1"><i class="fas fa-3x fa-star"></i></label>
                        </div>
                    </div>
                @else
                    <form action="{{ route('save-feedback') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ Auth::user()->id ?? ''}}" readonly>
                        <input type="hidden" name="company_id" value="{{ $user->company->id ?? '' }}" readonly>
                        {{-- <input type="hidden" value="{{ $quotation->id }}" name="id"/> --}}


                        {{-- Rating --}}
                        <div class="rate-info mt-2 d-flex flex-column">
                            <h3 class="card-title ms-3">How do you rate our website ?</h3>
                            <div class="rating" style="width: 20rem">
                                <input id="rating-5" type="radio" name="rating" value="5"/><label for="rating-5"><i class="fas fa-3x fa-star"></i></label>
                                <input id="rating-4" type="radio" name="rating" value="4"/><label for="rating-4"><i class="fas fa-3x fa-star"></i></label>
                                <input id="rating-3" type="radio" name="rating" value="3"/><label for="rating-3"><i class="fas fa-3x fa-star"></i></label>
                                <input id="rating-2" type="radio" name="rating" value="2"/><label for="rating-2"><i class="fas fa-3x fa-star"></i></label>
                                <input id="rating-1" type="radio" name="rating" value="1"/><label for="rating-1"><i class="fas fa-3x fa-star"></i></label>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="feedback quick p-3">
                                <div class="simplebar-wrapper">
                                    <span style="margin-left: -20px; font-weight:500;" id="quick-messages">
                                        <p class="feedback-text">It's such a nice web to find employee.</p>
                                        <p class="feedback-text">I'd like to suggest you something great.</p>
                                        <p class="feedback-text">The price is exceeding my limit.</p>
                                        <p class="feedback-text">I didn't like the web too small amount of peoples over here.</p>
                                    </span>
                                </div>
                            </div>

                            <div class="feedback p-3" style="height: 250px;">
                                <div class="simplebar-wrapper mt-3">
                                    <textarea  class="form-control" rows="6" value="" name="feedback" id="feedback" placeholder="write your feedback about this quotation" style="width:100%; resize:none;"></textarea>

                                    <div class="d-grid gap-2 mt-3">
                                        <input type="submit" class="btn btn-primary" value="Submit Now">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="{{ asset('frontend/js/simple-rating.js') }}"></script> --}}
<script>
    $(document).ready(function(){
        $(".feedback-text").click(function(){
            var text = $(this).text();
            $("#feedback").val(text);
        });
    });

    $(document).ready(function(){
        $('.rating').rating();
    });
</script>
