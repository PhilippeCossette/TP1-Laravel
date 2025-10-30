@extends('layouts.master')
@section('title', __('lang.text_documents'))
@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-semibold">
            <i class="ri-folder-open-line text-primary me-2"></i>
            @lang('lang.text_documents')
        </h1>
        <a href="{{ route('documents.create') }}" class="btn btn-primary shadow-sm">
            <i class="ri-upload-2-line me-1"></i> @lang('lang.text_upload')
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table align-middle mb-0">
                <thead class="table-light text-muted">
                    <tr>
                        <th class="ps-4">@lang('lang.text_title')</th>
                        <th>@lang('lang.text_owner')</th>
                        <th>@lang('lang.text_date')</th>
                        <th class="text-center">@lang('lang.text_actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documents as $doc)
                    <tr class="border-bottom">
                        <td class="ps-4 fw-medium">
                            <i class="ri-file-text-line text-secondary me-2"></i>
                            {{ $doc->title[app()->getLocale()] ?? $doc->title['en'] ?? '' }}
                        </td>
                        <td>{{ $doc->user->name }}</td>
                        <td>{{ $doc->created_at->format('Y-m-d') }}</td>
                        <td class="text-center">
                            <a href="{{ route('documents.download', $doc->id) }}"
                                class="btn btn-sm btn-outline-primary me-1" title="@lang('lang.text_download')">
                                <i class="ri-download-2-line"></i>
                            </a>

                            @if($doc->user_id === Auth::id())
                            <a href="{{ route('documents.edit', $doc->id) }}" class="btn btn-sm btn-outline-success me-1" title="@lang('lang.text_edit')">
                                <i class="ri-file-edit-line"></i>
                            </a>

                            <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                    title="@lang('lang.text_delete')"
                                    onclick="return confirm('Are you sure you want to delete this document?');">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">
                            <i class="ri-file-warning-line me-2"></i>
                            @lang('lang.no_documents')
                        </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $documents->links() }}
    </div>
</div>
@endsection