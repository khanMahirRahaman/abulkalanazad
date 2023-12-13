@extends('admin.errors.adminlte')

@section('title', __('error.title_500'))

@section('info')
    <i class="fas fa-exclamation-triangle text-danger"></i> {{ __('500') }}
@endsection

@section('code', '500')

@section('message')
    @if(__($exception->getMessage()))
    @else
        {!! __('error.message_500') !!}
    @endif
@endsection
