@extends('adminlte::page')

@section('title', __('contact.title_detail_message'))

@section('content_header')
    <x-breadcrumbs title="{{ __('contact.title_detail_message') }}" currentActive="{{ __('contact.title_detail_message') }}" :addLink="[route('contacts.index') => __('contact.title_contacts')]"/>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>{{ __('contact.name') }}</th>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <th>{{ __('contact.email') }}</th>
                        <td>{{ $contact->email }}</td>
                        <tr>
                            <th>{{ __('contact.subject') }}</th>
                            <td>{{ $contact->subject }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('contact.message') }}</th>
                            <td>{{ $contact->message }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('contact.date_&_time') }}</th>
                            <td>{{ $contact->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
    @include('layouts.partials._switch_lang')
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop
