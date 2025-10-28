@extends('layouts.master')
@section('title', 'Post')

@section('content')
<div class="container py-4 max-1200">

    @php
    $locale = app()->getLocale();
    @endphp

    <!-- Post Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            @if(empty($post->title[$locale]) || empty($post->content[$locale]))
            <p class="alert alert-warning py-2">
                ⚠ @lang('lang.fallback_notice')
            </p>
            @endif

            <h1 class="fw-bold">
                {{ $post->title[$locale] ?? $post->title['en'] ?? '(No title)' }}
            </h1>

            <p class="text-muted small mb-3">
                <i class="ri-user-line"></i>
                {{ $post->user->name ?? __('Unknown') }} •
                <i class="ri-calendar-line"></i>
                {{ $post->created_at->format('Y-m-d') }}
            </p>

            <p class="lead">
                {!! nl2br(e($post->content[$locale] ?? $post->content['en'] ?? '(No content)')) !!}
            </p>

        </div>

        @if($post->user_id === auth()->id())
        <div class="card-footer bg-light d-flex justify-content-end gap-2">
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-primary">
                <i class="ri-pencil-line"></i> @lang('lang.edit')
            </a>
            <form method="POST" action="{{ route('posts.destroy', $post) }}" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger">
                    <i class="ri-delete-bin-line"></i> @lang('lang.delete')
                </button>
            </form>
        </div>
        @endif
    </div>

    <!-- Like / Dislike Section (UI only) -->
    <div class="card shadow-sm mb-4">
        <div class="card-body text-center">
            <p class="fw-bold mb-3">@lang('lang.reactions')</p>

            <div class="d-flex justify-content-center gap-4">
                <button class="btn btn-outline-success px-4">
                    <i class="ri-thumb-up-line me-1"></i> @lang('lang.like')
                </button>

                <button class="btn btn-outline-danger px-4">
                    <i class="ri-thumb-down-line me-1"></i> @lang('lang.dislike')
                </button>
            </div>
        </div>
    </div>

    <!-- Comments Section (UI only) -->
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <strong><i class="ri-chat-3-line"></i> @lang('lang.comments')</strong>
        </div>

        <div class="card-body">
            <div class="d-flex gap-3 mb-4">
                <img src="https://ui-avatars.com/api/?name=User" class="rounded-circle" width="45" height="45">
                <div>
                    <strong>User 1</strong> <small class="text-muted">• 2h ago</small>
                    <p>This is a sample comment.</p>
                </div>
            </div>

            <div class="d-flex gap-3 mb-4">
                <img src="https://ui-avatars.com/api/?name=Anna" class="rounded-circle" width="45" height="45">
                <div>
                    <strong>Anna</strong> <small class="text-muted">• 1 day ago</small>
                    <p>Love this post! 😍</p>
                </div>
            </div>

            <form>
                <textarea class="form-control mb-2" placeholder="@lang('lang.add_comment')"></textarea>
                <button type="button" class="btn btn-primary w-100">
                    <i class="ri-send-plane-2-line"></i> @lang('lang.post_comment')
                </button>
            </form>
        </div>
    </div>

</div>
@endsection