@extends('layouts.master')
@section('title', __('lang.new_post'))

@section('content')
<div class="container py-4 max-1200">

    <h1 class="mb-4">@lang('lang.new_post')</h1>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif


    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        {{-- English Title --}}
        <div class="mb-3">
            <label class="form-label">@lang('lang.title_en')</label>
            <input type="text" name="title_en"
                class="form-control @error('title_en') is-invalid @enderror"
                value="{{ old('title_en') }}">
            @error('title_en')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">@lang('lang.content_en')</label>
            <textarea name="content_en" rows="4"
                class="form-control @error('content_en') is-invalid @enderror">{{ old('content_en') }}</textarea>
            @error('content_en')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">@lang('lang.title_fr')</label>
            <input type="text" name="title_fr"
                class="form-control @error('title_fr') is-invalid @enderror"
                value="{{ old('title_fr') }}">
            @error('title_fr')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">@lang('lang.content_fr')</label>
            <textarea name="content_fr" rows="4"
                class="form-control @error('content_fr') is-invalid @enderror">{{ old('content_fr') }}</textarea>
            @error('content_fr')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-3 mt-3">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">@lang('lang.back')</a>
            <button type="submit" class="btn btn-success">@lang('lang.publish')</button>
        </div>

    </form>

</div>
@endsection