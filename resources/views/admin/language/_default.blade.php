@empty($checked)
    <button type="button" class="default btn btn-primary btn-xs btn-flat" data-item="{{ $item }}">{{ __('localization.button_make_default') }}</button>
@else
    <span class="badge badge-info">{{ __('localization.badge_default') }}</span>
@endempty
