@extends('layouts.master')
@section('title', __('lang.text_documents'))
@section('content')
<h1 class="mb-4">@lang('lang.text_documents')</h1>
<a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">@lang('lang.text_upload')</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>@lang('lang.text_title_fr')</th>
            <th>@lang('lang.text_title_en')</th>
            <th>@lang('lang.text_owner')</th>
            <th>@lang('lang.text_date')</th>
            <th>@lang('lang.text_actions')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documents as $doc)
        <tr>
            <td>{{ $doc->title_fr }}</td>
            <td>{{ $doc->title_en }}</td>
            <td>{{ $doc->user->name }}</td>
            <td>{{ $doc->created_at->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('documents.download', $doc->id) }}" class="btn btn-sm btn-outline-primary">@lang('lang.text_download')</a>

                @if($doc->user_id === Auth::id())
                <a href="{{ asset('storage/' . $doc->file_path) }}" download class="btn btn-sm btn-outline-primary">
                    @lang('lang.text_download')
                </a>

                <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">@lang('lang.text_delete')</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $documents->links() }}
@endsection