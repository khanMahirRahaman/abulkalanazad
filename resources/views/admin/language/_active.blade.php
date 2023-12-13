@empty($default)
    <input data-code="{{ $code }}" class="toggle-class" name="active" type="checkbox" {{ $checked }} data-toggle="toggle" data-size="sm" data-on="{{ __('localization.button_option_yes') }}" data-off="{{ __('localization.button_option_no') }}">
@else
    <input data-code="{{ $code }}" class="toggle-class" name="active" type="checkbox" {{ $checked }} data-toggle="toggle" data-size="sm" data-on="{{ __('localization.button_option_yes') }}" data-off="{{ __('localization.button_option_no') }}" disabled>
@endempty
