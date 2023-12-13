<div class="tab-pane fade" id="web-contact" role="tabpanel" aria-labelledby="web-contact-tab">
    <form id="form-web-contact" action="" method="POST" role="form">
        @method('PATCH')
        @csrf
        <input type="hidden" name="web_contact">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="street">{{ __('setting.label_address_street') }}</label>
                    <input id="street" type="text" name="street" class="form-control" placeholder="{{ __('setting.placeholder_address_street') }}" value="{{ $setting->key('street') }}">
                    <div class="msg-street"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="city">{{ __('setting.label_address_city') }}</label>
                    <input id="city" type="text" name="city" class="form-control" placeholder="{{ __('setting.placeholder_address_city') }}" value="{{ $setting->key('city') }}">
                    <div class="msg-city"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="postal_code">{{ __('setting.label_postal_code') }}</label>
                    <input id="postal_code" type="text" name="postal_code" class="form-control" placeholder="{{ __('setting.placeholder_postal_code') }}" value="{{ $setting->key('postal_code') }}">
                    <div class="msg-postal_code"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="state">{{ __('setting.label_address_state') }}</label>
                    <input id="state" type="text" name="state" class="form-control" placeholder="{{ __('setting.placeholder_address_state') }}" value="{{ $setting->key('state') }}">
                    <div class="msg-state"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="country">{{ __('setting.label_address_country') }}</label>
                    <input id="country" type="text" name="country" class="form-control" placeholder="{{ __('setting.placeholder_address_country') }}" value="{{ $setting->key('country') }}">
                    <div class="msg-country"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="siteemail">{{ __('setting.label_email') }}</label>
                    <input id="siteemail" type="email" name="site_email" class="form-control" placeholder="{{ __('setting.placeholder_email') }}" value="{{ $setting->key('site_email') }}">
                    <div class="msg-siteemail"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="sitephone">{{ __('setting.label_phone') }}</label>
                    <input id="sitephone" type="text" name="site_phone" class="form-control" placeholder="{{ __('setting.placeholder_phone') }}" value="{{ $setting->key('site_phone') }}">
                    <div class="msg-sitephone"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="contactdescription">{{ __('setting.label_full_address') }}</label>
                    <textarea id="fulladdress" name="full_address" class="form-control" rows="3" placeholder="{{ __('setting.placeholder_full_address') }}">{!! nl2br($setting->key('full_address') ) !!}</textarea>
                    <div class="msg-fulladdress"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="contactdescription">{{ __('setting.label_contact_description') }}</label>
                    <textarea id="contactdescription" name="contact_description"
                              class="form-control" rows="3" placeholder="{{ __('setting.placeholder_contact_description') }}">{!! nl2br($setting->key('contact_description') )!!}</textarea>
                    <div class="msg-contactdescription"></div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="socialmedia">{{ __('setting.label_socialmedia') }}</label>
                    <select id="socialmedia" name="social_media" class="select2"
                            data-placeholder="{{ __('setting.placeholder_socialmedia') }}" style="width: 100%;"></select>
                </div>
            </div>
        </div>
        <div class="row socmed">
            @if($socialmedia)
                @foreach($socialmedia as $data)
                    <div class="col-lg-6" id="socmed{{ $data->id }}">
                        <div class="form-group"><label> {{ __('setting.label_socialmedia_url') }} {{ $data->name }} </label>
                            <div class="input-group mb-3">
                                <input type="hidden" name="social_media[{{ $data->id }}][id]" value="{{ $data->id }}">
                                <div class="input-group-prepend"><span class="input-group-text"> <i class="{{ $data->icon }}"></i></span></div>
                                <input type="text" name="social_media[{{ $data->id }}][url]" class="form-control" placeholder="" value="{{ $data->site->url }}">
                                <div class="input-group-append" onclick="removeInput({{ $data->id }})"><span class="input-group-text"><i class="fas fa-times"></i></span></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mt-3">
            <button id="submit-web-contact" type="submit" class="btn btn-info float-right">{{ __('setting.button_submit') }}</button>
        </div>
    </form>
</div>
