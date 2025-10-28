@extends('layouts.master')
@section('title', __('lang.edit_post_title'))

@section('content')
<div class="container py-4 max-1200">

    <h1 class="mb-4">@lang('lang.edit_post_title')</h1>

    {{-- ✅ Flash Messages --}}
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

    {{-- ✅ Form --}}
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        {{-- English Title --}}
        <div class="mb-3">
            <label class="form-label">@lang('lang.title_en')</label>
            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                name="title_en"
                value="{{ old('title_en', $post->title['en'] ?? '') }}">
            @error('title_en')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- English Content --}}
        <div class="mb-3">
            <label class="form-label">@lang('lang.content_en')</label>
            <textarea class="form-control @error('content_en') is-invalid @enderror"
                name="content_en" rows="4">{{ old('content_en', $post->content['en'] ?? '') }}</textarea>
            @error('content_en')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- French Title --}}
        <div class="mb-3">
            <label class="form-label">@lang('lang.title_fr')</label>
            <input type="text" class="form-control @error('title_fr') is-invalid @enderror"
                name="title_fr"
                value="{{ old('title_fr', $post->title['fr'] ?? '') }}">
            @error('title_fr')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- French Content --}}
        <div class="mb-3">
            <label class="form-label">@lang('lang.content_fr')</label>
            <textarea class="form-control @error('content_fr') is-invalid @enderror"
                name="content_fr" rows="4">{{ old('content_fr', $post->content['fr'] ?? '') }}</textarea>
            @error('content_fr')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-3 mt-3">
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">
                @lang('lang.back')
            </a>

            <button type="submit" class="btn btn-primary">
                @lang('lang.btn_update_post')
            </button>
        </div>
    </form>

</div>
@endsection