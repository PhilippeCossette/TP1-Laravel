@extends('layouts.master')
@section('title', __('lang.forum'))

@section('content')
<div class="container py-4 max-1200">

    @php
    $locale = app()->getLocale();
    @endphp

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">@lang('lang.forum')</h1>

        @auth
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            <i class="ri-add-circle-line"></i> @lang('lang.new_post')
        </a>
        @endauth
    </div>

    @if($posts->count() == 0)
    <div class="alert alert-info text-center">
        @lang('lang.no_posts')
    </div>
    @endif

    <div class="row g-4">
        @foreach ($posts as $post)

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm h-100 d-flex flex-column">

                <div class="card-body">
                    <h5 class="fw-bold">
                        {{ $post->title[$locale] ?? $post->title['en'] ?? $post->title['fr'] ?? '(No title)' }}
                    </h5>

                    <p class="text-muted small mb-2">
                        <i class="ri-user-line"></i> {{ $post->user->name ?? 'Unknown' }} •
                        <i class="ri-time-line"></i> {{ $post->created_at->format('Y-m-d') }}
                    </p>

                    <p class="text-secondary small">
                        {{ \Illuminate\Support\Str::limit(strip_tags(
                            $post->content[$locale] ?? $post->content['en'] ?? $post->content['fr'] ?? '(No content)'
                        ), 90, '...') }}
                    </p>
                </div>

                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary btn-sm">
                        <i class="ri-eye-line"></i> @lang('lang.view_post')
                    </a>

                    <div class="d-flex gap-3 text-muted">
                        <span><i class="ri-thumb-up-line"></i> 0</span>
                        <span><i class="ri-chat-3-line"></i> 0</span>
                    </div>
                </div>

            </div>
        </div>

        @endforeach
    </div>

</div>
@endsection