<div class="container mt-5">
    <div class="card p-4">
        <div class="row">
            <!-- Overall rating section -->
            <div class="col-md-4 text-center">
                <h2 class="display-4">{{ $total_array['total_rating']}}</h2>
                <div class="d-flex justify-content-center align-items-center">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fa fa-star{{ $i <= $total_array['total_rating'] ? '' : '-o' }}" style="color: #FFD700;"></i>
                    @endfor
                </div>
                <p class="mt-2"><i class="fa fa-user"></i> {{ $total_array['total_count'] }} total</p>
            </div>

            <div class="col-md-8">
                <div class="rating-breakdown">
                    @foreach ($total_array['ratings'] as $rating => $count)
                        @php
                            $percentage = $total_array['total_count'] > 0 ? ($count / $total_array['total_count']) * 100 : 0;
                            $color = $total_array['colors'][$rating] ?? 'bg-secondary';
                        @endphp
                        <div class="d-flex align-items-center mb-2">
                            <span class="me-2">{{ $rating }} <i class="fa fa-star text-warning"></i></span>
                            <div class="progress flex-grow-1">
                                <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="ms-2">{{ $count }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
