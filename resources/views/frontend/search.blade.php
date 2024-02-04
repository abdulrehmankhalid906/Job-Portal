<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-3">
                        <input type="text" class="form-control border-0" placeholder="Keyword" />
                    </div>
                    <div class="col-md-3">
                        <select class="form-select border-0" id="category_id">
                            <option value="">Select One</option>
                            @if(count($categories)>0)
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select border-0" id="country_id">
                            <option value="">Select One</option>
                            @if(count($countries)>0)
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select border-0" id="city_id">
                            <option value="">Select One</option>
                            {{-- @if(count($cities)>0)
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            @endif --}}
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark border-0 w-100" id="search_job">Search</button>
            </div>
        </div>
    </div>
</div>
