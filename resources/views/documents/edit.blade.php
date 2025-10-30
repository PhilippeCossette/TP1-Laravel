@extends('layouts.master')
@section('title', __('lang.text_edit'))

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-semibold">
            <i class="ri-edit-2-line text-success me-2"></i>
            @lang('lang.text_edit')
        </h1>
        <a href="{{ route('documents.index') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="ri-arrow-go-back-line me-1"></i> @lang('lang.text_documents')
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('documents.update', $document->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="mb-3">
                    <label for="title_fr" class="form-label fw-medium">
                        <i class="ri-flag-2-line text-danger me-1"></i>
                        @lang('lang.text_title_fr')
                    </label>
                    <input type="text" name="title_fr" id="title_fr"
                        class="form-control @error('title_fr') is-invalid @enderror"
                        value="{{ old('title_fr', $document->title['fr'] ?? '') }}" placeholder="Titre en français">
                    @error('title_fr')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="title_en" class="form-label fw-medium">
                        <i class="ri-flag-line text-primary me-1"></i>
                        @lang('lang.text_title_en')
                    </label>
                    <input type="text" name="title_en" id="title_en"
                        class="form-control @error('title_en') is-invalid @enderror"
                        value="{{ old('title_en', $document->title['en'] ?? '') }}" placeholder="Title in English">
                    @error('title_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="file" class="form-label fw-medium">
                        <i class="ri-file-line text-secondary me-1"></i>
                        @lang('lang.text_file')
                    </label>

                    <div class="d-flex align-items-center gap-3 mb-2">
                        <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank"
                            class="btn btn-outline-primary btn-sm">
                            <i class="ri-file-search-line me-1"></i> @lang('lang.text_download')
                        </a>
                        <small class="text-muted">{{ basename($document->file_path) }}</small>
                    </div>

                    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                    <div class="form-text text-muted">
                        @lang('lang.text_file') — PDF, ZIP, or DOC (max 5MB)
                    </div>
                    @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success shadow-sm">
                        <i class="ri-check-line me-1"></i> @lang('lang.text_edit')
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection