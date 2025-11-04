@extends('layouts.master')
@section('title', __('lang.register_title'))

@section('content')

<section class="login-section">
    <img class="background-img"
        src="https://www.cmaisonneuve.qc.ca/public/uploads/2025/09/CM-25042023_Inauguration-jardin_S300dpi_IMG2568.jpg.webp"
        alt="Maisonneuve College">

    <div class="form-login-container">
        <h1>@lang('lang.register_heading')</h1>
        <p>@lang('lang.register_description')</p>

        <form action="{{ route('register.store') }}" method="POST" class="row g-3">
            @csrf

            
            <div class="col-md-6">
                <label for="first_name" class="form-label form-label-light">@lang('lang.first_name')</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{ old('first_name') }}" required>
                @error('first_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="last_name" class="form-label form-label-light">@lang('lang.last_name')</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{ old('last_name') }}" required>
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="col-md-6">
                <label for="email" class="form-label form-label-light">@lang('lang.email')</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email') }}" required>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="phone_number" class="form-label form-label-light">@lang('lang.phone')</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    value="{{ old('phone_number') }}">
                @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="col-md-6">
                <label for="password" class="form-label form-label-light">@lang('lang.password')</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="password_confirmation" class="form-label form-label-light">@lang('lang.password_confirm')</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

           
            <div class="col-md-6">
                <label for="birth_date" class="form-label form-label-light">@lang('lang.birth_date')</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date"
                    value="{{ old('birth_date') }}">
                @error('birth_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="address" class="form-label form-label-light">@lang('lang.address')</label>
                <input type="text" class="form-control" id="address" name="address"
                    value="{{ old('address') }}">
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="col-md-6">
                <label for="city_id" class="form-label form-label-light">@lang('lang.city')</label>
                <select class="form-select" id="city_id" name="city_id" required>
                    <option value="" disabled selected>@lang('lang.choose_city')</option>
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                    @endforeach
                </select>
                @error('city_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">@lang('lang.btn_register')</button>
            </div>

        </form>
    </div>

    <a href="{{ route('login') }}" class="btn btn-link-custom">@lang('lang.already_have_account')</a>
</section>

@endsection