@extends('layouts.master')
@section('title', __('lang.home_title'))

@section('content')

<section class="bg-light text-center">
    <div class="container p-4 max-1200 d-flex flex-column flex-md-row align-items-center justify-content-between gap-4">

        <!-- Text -->
        <div class="text-md-start text-center flex-fill">
            <h1 class="display-4 fw-bold">@lang('lang.welcome_title')</h1>
            <p class="lead text-muted">@lang('lang.welcome_subtitle')</p>

            <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-start gap-2 mt-3">
                <a href="#" class="btn btn-primary btn-lg">@lang('lang.btn_learn_more')</a>
                <a href="#" class="btn btn-outline-secondary btn-lg">@lang('lang.btn_contact_us')</a>
            </div>
        </div>

        <!-- Image -->
        <div class="flex-fill">
            <img src="{{ asset('images/banner.webp') }}" alt="Banner Image" class="img-fluid rounded shadow">
        </div>

    </div>
</section>

<section>
    <div class="container max-1200 p-4">
        <h2 class="mb-4">@lang('lang.why_choose')</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="d-flex gap-3 bg-light p-3 rounded h-100">
                    <i class="ri-group-2-line display-5 text-primary mb-3"></i>
                    <div>
                        <h5>@lang('lang.dynamic_community')</h5>
                        <p>@lang('lang.dynamic_community_desc')</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="d-flex gap-3 bg-light p-3 rounded h-100">
                    <i class="ri-book-open-line display-5 text-primary mb-3"></i>
                    <div>
                        <h5>@lang('lang.academic_excellence')</h5>
                        <p>@lang('lang.academic_excellence_desc')</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="d-flex gap-3 bg-light p-3 rounded h-100">
                    <i class="ri-map-pin-line display-5 text-primary mb-3"></i>
                    <div>
                        <h5>@lang('lang.ideal_location')</h5>
                        <p>@lang('lang.ideal_location_desc')</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="container max-1200 p-4">
        <h2 class="mb-4">@lang('lang.our_programs')</h2>

        <div class="grow-effect">

            <a href="#" class="grow-effect-item">
                <h3 class="grow-effect-title">@lang('lang.program_nursing')</h3>
                <img class="grow-effect-img" src="https://images.unsplash.com/photo-1527613426441-4da17471b66d" alt="">
                <div class="grow-effect-content">
                    <p>@lang('lang.program_nursing_desc')</p>
                    <button class="btn btn-outline-primary">@lang('lang.btn_learn_more')</button>
                </div>
            </a>

            <a href="#" class="grow-effect-item">
                <h3 class="grow-effect-title">@lang('lang.program_software')</h3>
                <img class="grow-effect-img" src="https://images.unsplash.com/photo-1529429612779-c8e40ef2f36d" alt="">
                <div class="grow-effect-content">
                    <p>@lang('lang.program_software_desc')</p>
                    <button class="btn btn-outline-primary">@lang('lang.btn_learn_more')</button>
                </div>
            </a>

            <a href="#" class="grow-effect-item">
                <h3 class="grow-effect-title">@lang('lang.program_photography')</h3>
                <img class="grow-effect-img" src="https://images.unsplash.com/photo-1541516160071-4bb0c5af65ba" alt="">
                <div class="grow-effect-content">
                    <p>@lang('lang.program_photography_desc')</p>
                    <button class="btn btn-outline-primary">@lang('lang.btn_learn_more')</button>
                </div>
            </a>

            <a href="#" class="grow-effect-item">
                <h3 class="grow-effect-title">@lang('lang.program_cooking')</h3>
                <img class="grow-effect-img" src="https://images.unsplash.com/photo-1683624328172-88fb24625ec1" alt="">
                <div class="grow-effect-content">
                    <p>@lang('lang.program_cooking_desc')</p>
                    <button class="btn btn-outline-primary">@lang('lang.btn_learn_more')</button>
                </div>
            </a>

            <a href="#" class="grow-effect-item">
                <h3 class="grow-effect-title">@lang('lang.program_other')</h3>
                <img class="grow-effect-img" src="https://images.unsplash.com/photo-1523240795612-9a054b0db644" alt="">
                <div class="grow-effect-content">
                    <p>@lang('lang.program_other_desc')</p>
                    <button class="btn btn-outline-primary">@lang('lang.btn_learn_more')</button>
                </div>
            </a>

        </div>
    </div>
</section>

@endsection