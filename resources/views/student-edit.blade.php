@extends('layouts.master')
@section('title', __('lang.edit_student_title'))

@section('content')

<section style="min-height: 100vh; width: 100%;">

    <div class="container py-4 max-1200 d-flex flex-column flex-wrap align-items-center gap-3">

       
        <a style="cursor: pointer;" class="me-auto text-muted"
            onclick="window.location.href='{{ route('students.show', $student->id) }}'">
            <i class="ri-arrow-left-fill"></i> @lang('lang.back')
        </a>

        <div class="d-flex justify-content-center">

            <form action="{{ route('students.update', $student->id) }}" method="POST"
                class="form-container p-4 border shadow bg-light">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="first_name" class="form-label">@lang('lang.first_name')</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ old('first_name', $student->first_name) }}" required>
                    @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">@lang('lang.last_name')</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ old('last_name', $student->last_name) }}" required>
                    @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">@lang('lang.email')</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $student->email) }}" required>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">@lang('lang.phone')</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        value="{{ old('phone_number', $student->phone_number) }}">
                    @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="birth_date" class="form-label">@lang('lang.birth_date')</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date"
                        value="{{ old('birth_date', $student->birth_date) }}">
                    @error('birth_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">@lang('lang.address')</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ old('address', $student->address) }}">
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="city_id" class="form-label">@lang('lang.city')</label>
                    <select class="form-select" id="city_id" name="city_id" required>
                        <option value="" disabled>@lang('lang.choose_city')</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}"
                            {{ old('city_id', $student->city_id) == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    @lang('lang.btn_update_student')
                </button>

            </form>
        </div>

    </div>
</section>

@endsection