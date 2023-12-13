@extends('frontend.magz.index')

@section('content')
    <section class="page">
        <div class="container-md">
            <div class="row">
                <div class="col-xl-12">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="/">{{ __('theme_magz.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('theme_magz.contact_us') }}</li>
                    </ol>
                    <h1 class="page-title">{{ __('theme_magz.contact_us') }}</h1>
                    <p class="page-subtitle">{{ __('theme_magz.contact_us_subtitle') }}</p>
                    <div class="line thin"></div>
                    <div class="page-description">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <h3>{{ __('theme_magz.contact') }}</h3>
                                <p>
                                    {{ Settings::key('contact_description') }}
                                </p>
                                <p>
                                    {{ __('theme_magz.contact_phone') }}: <span
                                        class="bold">{{ Settings::key('site_phone') }}</span> <br>
                                    {{ __('theme_magz.contact_email') }}: <span
                                        class="bold">{{ Settings::key('site_email') }}</span>
                                    <br>
                                    <br>
                                <p>
                                    {{ Settings::key('street') }} <br>
                                    {{ Settings::key('city') . ' ' . Settings::key('postal_code') }} <br>
                                    {{ Settings::key('state') . ' - ' . Settings::key('country') }}
                                </p>

                                </p>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <form class="row contact" id="contact-form" method="POST" role="form"
                                    data-recaptcha="true">
                                    <div class="col-xl-6">
                                        <div class="form-group form-group-name">
                                            <label>{{ __('theme_magz.contact_name') }} <span
                                                    class="required"></span></label>
                                            <input type="text" class="form-control" name="name" required>
                                            <span id="msg-error-name" class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group form-group-email">
                                            <label>{{ __('theme_magz.contact_email') }} <span
                                                    class="required"></span></label>
                                            <input type="text" class="form-control" name="email" required>
                                            <span id="msg-error-email" class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group form-group-subject">
                                            <label>{{ __('theme_magz.contact_subject') }}</label>
                                            <input type="text" class="form-control" name="subject">
                                            <span id="msg-error-subject" class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group form-group-message">
                                            <label>{{ __('theme_magz.contact_message') }} <span
                                                    class="required"></span></label>
                                            <textarea class="form-control" name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        @empty(env('NOCAPTCHA_SITEKEY'))
                                            <p class="text-danger">
                                                <i>{{ __('theme_magz.your_captcha_is_not_yet_configured') }}</i>
                                            </p>
                                        @else
                                            {!! NoCaptcha::display() !!}
                                        @endempty
                                    </div>
                                    <div class="col-xl-12" style="margin-top:10px">
                                        @empty(env('NOCAPTCHA_SITEKEY'))
                                            <button type="button" class="btn btn-primary"
                                                disabled>{{ __('theme_magz.contact_button') }}</button>
                                        @else
                                            <button type="submit"
                                                class="btn btn-primary">{{ __('theme_magz.contact_button') }}</button>
                                        @endempty
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="maps">
        <iframe src="{{ Settings::key('google_map_code') }}" width="100%" height="450" style="border:0;"
            allowfullscreen=""></iframe>
    </section>
@stop
