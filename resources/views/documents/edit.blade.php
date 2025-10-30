@extends('layouts.master')
@section('title', __('lang.text_edit'))
@section('content')
<h1 class="mb-4">@lang('lang.text_edit')</h1>

<form method="POST" action="{{ route('documents.update', $document->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title_fr" class="form-label">@lang('lang.text_title_fr')</label>
        <input type="text" name="title_fr" id="title_fr" class="form-control"
            value="{{ old('title_fr', $document->title_fr) }}">
    </div>

    <div class="mb-3">
        <label for="title_en" class="form-label">@lang('lang.text_title_en')</label>
        <input type="text" name="title_en" id="title_en" class="form-control"
            value="{{ old('title_en', $document->title_en) }}">
    </div>

    <button type="submit" class="btn btn-success">@lang('lang.text_edit')</button>
    <a href="{{ route('documents.index') }}" class="btn btn-secondary">@lang('lang.text_documents')</a>
</form>
@endsection