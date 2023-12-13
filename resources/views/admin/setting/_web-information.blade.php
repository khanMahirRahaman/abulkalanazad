<div class="tab-pane text-left fade show active" id="web-information" role="tabpanel" aria-labelledby="web-information-tab">
    <form id="form-web-information" action="" method="POST" role="form">
        @method('PATCH')
        @csrf
        <input type="hidden" name="web_information">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="company_name">{{ __('setting.label_company_name') }}</label>
                    <input id="company_name" type="text" name="company_name" class="form-control" placeholder="{{ __('setting.placeholder_company_name') }}" value="{{ $setting->key('company_name') }}">
                    <div class="msg-company_name"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="site_name">{{ __('setting.label_web_name') }}</label>
                    <input id="site_name" type="text" name="site_name" class="form-control" placeholder="{{ __('setting.placeholder_web_name') }}" value="{{ $setting->key('site_name') }}">
                    <div class="msg-site_name"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="site_url">{{ __('setting.label_web_url') }}</label>
                    <input id="site_url" type="text" name="site_url" class="form-control" placeholder="{{ __('setting.placeholder_web_url') }}" value="{{ $setting->key('site_url') }}">
                    <div class="msg-site_url"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="site_description">{{ __('setting.label_web_description') }}</label>
                    <textarea id="site_description" name="site_description" class="form-control" rows="3" placeholder="{{ __('setting.placeholder_web_description') }}..">{{ $setting->key('site_description') }}</textarea>
                    <div class="msg-site_description"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="meta_keyword">{{ __('setting.label_web_keyword') }}</label>
                    <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="3" placeholder="{{ __('setting.placeholder_web_keyword') }}">{{ $setting->key('meta_keyword') }}</textarea>
                    <div class="msg-meta_keyword"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="credit_footer">{{ __('setting.label_credit_footer') }}</label>
                    <textarea class="form-control" name="credit_footer" id="credit_footer" rows="3">{{ $creditFooter }}</textarea>
                    <div class="msg-credit_footer"></div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button id="submit-web-properties" type="submit" class="btn btn-info float-right">{{ __('setting.button_submit') }}</button>
        </div>
    </form>
</div>
