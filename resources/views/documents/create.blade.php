@extends('layouts.master')
@section('title', __('lang.text_upload'))
@section('content')
<h1 class="mb-4">@lang('lang.text_upload')</h1>
<form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title_fr" class="form-label">@lang('lang.text_title_fr')</label>
        <input type="text" name="title_fr" id="title_fr" class="form-control" value="{{ old('title_fr') }}">
    </div>
    <div class="mb-3">
        <label for="title_en" class="form-label">@lang('lang.text_title_en')</label>
        <input type="text" name="title_en" id="title_en" class="form-control" value="{{ old('title_en') }}">
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">@lang('lang.text_file')</label>
        <input type="file" name="file" id="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">@lang('lang.text_btn_upload')</button>
</form>
@endsection