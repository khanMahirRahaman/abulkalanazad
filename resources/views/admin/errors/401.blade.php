@extends('admin.errors.adminlte')

@section('title', __('error.title_401'))

@section('info')
    <i class="fas fa-exclamation-triangle text-danger"></i> {{ __('error.401') }}
@endsection

@section('code', '401')

@section('message')
    @if(__($exception->getMessage()))
    @else
        {!! __('error.message_401') !!}
    @endif
@endsection
