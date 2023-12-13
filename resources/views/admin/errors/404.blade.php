@extends('admin.errors.adminlte')

@section('title', __('error.title_404'))
@section('info')
    <i class="fas fa-exclamation-triangle text-warning"></i> {{ __('error.404') }}
@endsection

@section('code', '404')

@section('message')
    @if(__($exception->getMessage()))
        @else
        {!! __('error.message_404') !!}
    @endif
@endsection
