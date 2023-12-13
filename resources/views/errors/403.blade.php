@extends('errors::magz')

@section('title', __('theme_magz.Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'theme_magz.Forbidden'))
