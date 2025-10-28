@extends('layouts.master')
@section('title', __('lang.login_title'))

@section('content')

<section class="login-section">
    <img class="background-img"
        src="https://www.cmaisonneuve.qc.ca/public/uploads/2025/09/CM-25042023_Inauguration-jardin_S300dpi_IMG2568.jpg.webp"
        alt="Maisonneuve College">

    <div class="form-login-container">
        <h1>@lang('lang.login_heading')</h1>
        <p>@lang('lang.login_description')</p>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            @error('error')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="email" class="form-label form-label-light">@lang('lang.email')</label>
                <input type="email" class="form-control" id="email" name="email"
                    required value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label form-label-light">@lang('lang.password')</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">@lang('lang.btn_login')</button>

        </form>
    </div>

    <a href="{{ route('register') }}" class="btn btn-link-custom">
        @lang('lang.no_account_create')
    </a>

</section>

@endsection