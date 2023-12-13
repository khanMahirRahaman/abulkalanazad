<div class="tab-pane fade" id="web-config" role="tabpanel" aria-labelledby="web-config-tab">
    <form id="form-web-config" action="{{ route('settings.update') }}" method="POST" role="form" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <input type="hidden" name="web_config">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>{{ __('setting.label_google_analytics_id') }}</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-google"></i></span>
                        </div>
                        <input type="text" name="google_analytics_id" class="form-control" placeholder="{{ __('setting.placeholder_google_analytics_id') }}" value="{{ $setting->key('google_analytics_id') }}">
                        <div class="msg-googleanalyticsid"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('setting.label_publisher_id') }}</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-bullhorn"></i></span>
                        </div>
                        <input type="text" name="publisher_id" class="form-control" placeholder="{{ __('setting.placeholder_publisher_id') }}" value="{{ $setting->key('publisher_id') }}">
                        <div class="msg-publisherid"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('setting.label_disqus_shortname') }}</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-comments"></i></span>
                        </div>
                        <input type="text" name="disqus_shortname" class="form-control" placeholder="{{ __('setting.placeholder_disqus_shortname') }}" value="{{ $setting->key('disqus_shortname') }}">
                        <div class="msg-disqusshortname"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>{{ __('setting.label_analytics_view_id') }}</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-chart-line"></i></span>
                        </div>
                        <input type="text" name="analytics_view_id" class="form-control" placeholder="{{ __('setting.placeholder_analytics_view_id') }}" value="{{ $analyticsViewId }}">
                        <div class="msg-googleanalyticsid"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('setting.label_credential_file') }}</label><br>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="credentials_file" class="custom-file-input" id="credentialFile" value="{{ $setting->key('credentials_file') }}">
                            <label class="custom-file-label" for="credentialFile">{{ __('setting.placeholder_credential_file') }}</label>
                        </div>
                    </div>
                    <p>
                        <small>
                            {{ __('setting.help_credential_file') }}<br>
                        </small>
                    </p>
                </div>
                <div class="form-group">
                    <label>{{ __('setting.label_google_map_code') }}</label>
                    <textarea name="google_map_code" class="form-control" rows="5" placeholder="{{ __('setting.placeholder_google_map_code') }}">{{ $setting->key('google_map_code') }}</textarea>
                    <div class="msg-googlemapcode"></div>
                </div>
            </div>
        </div>
    <div class="row mt-3">
        <div class="col-lg-12">
            <button id="submit-web-config" type="submit" class="btn btn-info float-right">{{ __('setting.button_submit') }}</button>
        </div>
    </div>
    </form>
    <hr>
    <div class="row mt-3">
        <div class="form-group col-lg-12">
            <label>{{ __('setting.label_switch_display_language') }}</label>
            <div class="custom-control custom-switch">
                <input type="checkbox" name="maintenance"
                       class="custom-control-input" data-id="" id="switchDisplayLanguage" {{ $showLanguage }}>
                <label class="custom-control-label" for="switchDisplayLanguage">
                    {{ __('setting.control_label_switch_display_language') }}
                </label>
            </div>
        </div>
        <div class="form-group col-lg-12">
            <label for="site_language">{{ __('setting.label_site_language') }}</label>
            <select id="site_language" name="site_language" class="form-control" data-placeholder="{{ __('setting.placeholder_web_language') }}.." style="width: 100%;">
                @foreach( $languages as $languageCode => $languageName )
                    @if($languageCode == $setting->key('theme_language'))
                        <option value="{{ $languageCode }}" selected="selected">{{ $languageName }}</option>
                    @else
                        <option value="{{ $languageCode }}">{{ $languageName }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="row mt-3">
        <div class="form-group col-lg-12">
            <label>{{ __('setting.label_maintenance_mode') }}</label>
            <div class="custom-control custom-switch">
                <input type="checkbox" name="maintenance"
                       class="custom-control-input" data-id="" id="customSwitch1" {{ $maintenance }}>
                <label class="custom-control-label" for="customSwitch1">
                    {{ __('setting.control_label_maintenance_mode') }}
                </label>
            </div>
        </div>
        @can('register-users')
            <div class="form-group col-lg-12">
                <label>{{ __('setting.label_register') }}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="maintenance" class="custom-control-input" data-id="" id="customSwitch2" {{ $register }}>
                    <label class="custom-control-label" for="customSwitch2">
                        {{ __('setting.control_label_register') }}
                    </label>
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label>{{ __('setting.label_email_verification') }}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="email_verification" class="custom-control-input" data-id="" id="customSwitch3" {{ $emailVerification }}>
                    <label class="custom-control-label" for="customSwitch3">
                        {{ __('setting.control_label_email_verification') }}
                    </label>
                </div>
            </div>
        @endcan
        <div class="form-group col-lg-12">
            <label>{{ __('setting.label_symlink') }}</label>
            <div>
                <button id="symlink-create" type="button" class="symlink btn btn-primary btn-sm" @if(Settings::key('symlink') == 'true') hidden @endif><i class="fa fa-link"></i> {{ __('setting.btn_create') }}</button>
                <button id="symlink-again" type="button" class="symlink btn btn-success btn-sm" @if(Settings::key('symlink') == 'false') hidden @endif><i class="fa fa-redo"></i> {{ __('setting.btn_symlink_again') }}</button>
            </div>
        </div>
    </div>
</div>
