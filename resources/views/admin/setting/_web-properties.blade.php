<div class="tab-pane fade" id="web-properties" role="tabpanel" aria-labelledby="web-properties-tab">
    <form action="{{ route('settings.update') }}" method="POST" role="form"
          enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <input type="hidden" name="site_logo">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">{{ __('setting.label_logo_web_light') }}</label><br>
                    @empty($setting->key('logo_web_light'))
                        <img id="image_logo_web_light" src="{{ asset('themes/magz/images/logo-light.png') }}" alt="" class="mb-3 w-100" style="max-width:380px;max-height:400px">
                    @endempty
                    <img id="image_preview_logo_web_light" src="{{ $logoWebLight }}" alt="" class="mb-3 w-100 @empty($setting->key('logo_web_light')) d-none @endempty" style="max-width:380px;max-height:400px">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="logo_web_light" class="custom-file-input" value="{{ $setting->key('logo_web_light') }}" onchange="readImage(this)">
                            <label class="custom-file-label">{{ __('setting.placeholder_upload_file') }}</label>
                        </div>
                    </div>
                    <p>
                        <small>
                            {{ __('setting.help_logo_web') }}<br>
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">{{ __('setting.label_logo_web_dark') }}</label><br>
                    @empty($setting->key('logo_web_dark'))
                        <img id="image_logo_web_dark" src="{{ asset('themes/magz/images/logo.png') }}" alt="" class="mb-3 w-100" style="max-width:380px;max-height:400px">
                    @endempty
                    <img id="image_preview_logo_web_dark" src="{{ $logoWebDark }}" alt="" class="mb-3 w-100 @empty($setting->key('logo_web_dark')) d-none @endempty" style="max-width:380px;max-height:400px">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="logo_web_dark" class="custom-file-input" value="{{ $setting->key('logo_web_dark') }}" onchange="readImage(this)">
                            <label class="custom-file-label">{{ __('setting.placeholder_upload_file') }}</label>
                        </div>
                    </div>
                    <p>
                        <small>
                            {{ __('setting.help_logo_website') }}<br>
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">{{ __('setting.label_favicon') }}</label><br>
                    @empty($setting->key('favicon'))
                        <img id="image_favicon" src="{{ asset('favicons/favicon-96x96.png') }}" alt="" class="border mb-3" style="width:100px;max-width:100px;max-height:100px">
                    @endempty
                    <img id="image_preview_favicon" src="{{ $favicon }}" alt="" class="border mb-3 @empty($setting->key('favicon')) d-none @endempty" style="width:100px;max-width:100px;max-height:100px">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="favicon" class="custom-file-input" value="{{ $setting->key('favicon') }}" accept="image/x-png,image/jpeg, image/x-icon" onchange="readImage(this)">
                            <label class="custom-file-label">{{ __('setting.placeholder_upload_file') }}</label>
                        </div>
                    </div>
                    <p>
                        <small>
                            {{ __('setting.help_favicon') }}
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">{{ __('setting.label_open_graph_image') }}</label><br>
                    @empty($setting->key('og_image'))
                        <img id="image_og_image" src="{{ asset('img/cover.png') }}" alt="" class="mb-3 w-100" style="width:250px;max-width:250px;max-height:250px">
                    @endempty
                    <img id="image_preview_og_image" src="{{ $ogImage }}" alt="" class="border mb-3 @empty($setting->key('og_image')) d-none @endempty" style="width:250px;max-width:250px;max-height:250px">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="og_image" class="custom-file-input" value="{{ $setting->key('og_image') }}" onchange="readImage(this)">
                            <label class="custom-file-label">{{ __('setting.placeholder_upload_file') }}</label>
                        </div>
                    </div>
                    <p>
                        <small>
                            {{ __('setting.help_open_graph_image') }}<br>
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">{{ __('setting.label_dashboard_logo') }}</label><br>
                    @empty($setting->key('logo_dashboard'))
                        <img id="image_logo_dashboard" src="{{ asset('img/logo.png') }}" alt="" class="border mb-3" style="width:100px;max-width:100px;max-height:100px">
                    @endempty
                    <img id="image_preview_logo_dashboard" src="{{ $logoDashboard }}" alt="" class="border mb-3 @empty($setting->key('logo_dashboard')) d-none @endempty" style="width:100px;max-width:100px;max-height:100px">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="logo_dashboard" class="custom-file-input" value="{{ $setting->key('logo_dashboard') }}" onchange="readImage(this)">
                            <label class="custom-file-label">{{ __('setting.placeholder_upload_file') }}</label>
                        </div>
                    </div>
                    <p>
                        <small>
                            {{ __('setting.help_dashboard_logo') }}<br>
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">{{ __('setting.label_auth_logo') }}</label><br>
                    @empty($setting->key('logo_auth'))
                        <img id="image_logo_auth" src="{{ asset('img/logo-auth.png') }}" alt="" class="border mb-3" style="width:100px;max-width:100px;max-height:100px">
                    @endempty
                    <img id="image_preview_logo_auth" src="{{ $logoAuth }}" alt="" class="border mb-3 @empty($setting->key('logo_auth')) d-none @endempty" style="width:100px;max-width:100px;max-height:100px">
                    <div class="input-group">
                        <div class="custom-file">
                            <input id="uploadLogoAuth" type="file" name="logo_auth" class="custom-file-input" value="{{ $setting->key('logo_auth') }}" onchange="readImage(this)">
                            <label class="custom-file-label">{{ __('setting.placeholder_upload_file') }}</label>
                        </div>
                    </div>
                    <p>
                        <small>
                            {{ __('setting.help_auth_logo') }}<br>
                        </small>
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-info float-right">{{ __('setting.button_submit') }}</button>
        </div>
    </form>
</div>
