@extends('layouts.master')
@section('title', __('lang.student_details_title'))
@section('content')

<section>
    <div class="container max-1200 py-4">

        <header class="d-flex align-items-center mb-4 gap-3">
            <img class="rounded-pill" style="max-width: 100px;"
                src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" alt="">

            <div>
                @if (auth()->check() && auth()->user()->id === $student->user_id)
                <button onclick="window.location.href='{{ route('students.edit', $student->id) }}'"
                    class="btn btn-primary">
                    @lang('lang.btn_edit')
                </button>

                <form action="{{ route('students.destroy', $student->id) }}"
                    method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        @lang('lang.btn_delete')
                    </button>
                </form>
                @endif
            </div>
        </header>

        <div class="d-flex flex-column gap-2">

            <div>
                <p class="form-label">@lang('lang.first_name')</p>
                <span class="form-control">{{ $student->first_name }}</span>
            </div>

            <div>
                <p class="form-label">@lang('lang.last_name')</p>
                <span class="form-control">{{ $student->last_name }}</span>
            </div>

            <div>
                <p class="form-label">@lang('lang.email')</p>
                <span class="form-control">{{ $student->email }}</span>
            </div>

            <div>
                <p class="form-label">@lang('lang.phone')</p>
                <span class="form-control">{{ $student->phone_number }}</span>
            </div>

            <div>
                <p class="form-label">@lang('lang.birth_date')</p>
                <span class="form-control">{{ $student->birth_date }}</span>
            </div>

            <div>
                <p class="form-label">@lang('lang.address')</p>
                <span class="form-control">{{ $student->address }}</span>
            </div>

            <div>
                <p class="form-label">@lang('lang.city')</p>
                <span class="form-control">{{ $student->city->name }}</span>
            </div>

            <div>
                <p class="form-label">@lang('lang.country')</p>
                <span class="form-control">{{ $student->city->country }}</span>
            </div>

        </div>
    </div>
</section>

@endsection