<div class="card card-default">
    <form id="insert" role="form">
        @csrf
        <input id="tagLanguage" type="hidden" name="language" value="{{ Languages::showLangSession() }}">
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{ __('term.label_name') }}</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('term.placeholder_name') }}" required autofocus>
                <div class="invalid-feedback msg-error-name"></div>
            </div>
            <div class="form-group">
                <label for="name">{{ __('term.label_description') }}</label>
                <textarea name="description" class="form-control" rows="3" placeholder="{{ __('term.placeholder_description') }}" id="description"></textarea>
                <div class="invalid-feedback msg-error-description"></div>
            </div>
            <div class="form-group">
                <p>
                    <button type="button" class="btn btn-info btn-sm" id="translation" onclick="showTranslation()" disabled>
                        {{ __('term.button_add_translation') }}
                    </button>
                </p>
                <div id="container-translation"></div>
            </div>
        </div>
        <div class="card-footer">
            <button id="btn-reset" type="button" class="btn btn-warning" hidden>{{ __('term.button_cancel') }}</button>
            <button id="btn-submit" type="submit" class="btn btn-info float-right">{{ __('term.button_tag_submit') }}</button>
        </div>
    </form>
</div>
