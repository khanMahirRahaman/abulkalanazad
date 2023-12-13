<div class="card card-default">
    <form id="insert" role="form">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="language">{{ __('localization.label_language') }}</label>
                <select id="language" name="language" class="select2" data-placeholder="{{ __('localization.placeholder_language') }}" style="width: 100%;">
                    <option></option>
                </select>
                <div class="invalid-feedback msg-error-language"></div>
            </div>
            <div class="form-group">
				<label for="country">{{ __('localization.label_country') }}</label>
                <select id="country" name="country" class="select2" data-placeholder="{{ __('localization.placeholder_country') }}" style="width: 100%;">
                    <option></option>
                </select>
                <div class="invalid-feedback msg-error-country"></div>
            </div>
        </div>
        <div class="card-footer">
            <button id="btn-submit" type="submit" class="btn btn-info float-right">{{ __('localization.button_language_submit') }}</button>
        </div>
    </form>
</div>
