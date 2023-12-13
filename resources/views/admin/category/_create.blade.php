<div class="card card-default">
    <form id="insert" role="form" enctype="multipart/form-data">
        @csrf
        <input id="categoryLanguage" type="hidden" name="language" value="{{ Languages::showLangSession() }}">
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{ __('term.label_name') }}</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       id="name"
                       placeholder="{{ __('term.placeholder_name') }}"
                       required autofocus>
                <div class="invalid-feedback msg-error-name }}"></div>
            </div>
            <div class="form-group">
                <label for="slug">Slug (must be in English). No space or special character is allowed</label>
                <input type="text"
                       name="slug"
                       class="form-control"
                       id="slug"
                       placeholder="Slug here"
                       required autofocus>
                <div class="invalid-feedback msg-error-slug }}"></div>
            </div>

            <div class="form-group">
                <label for="parent">{{ __('term.label_parent') }}</label>
                <select id="parent"
                        name="parent"
                        class="select2"
                        data-placeholder="{{ __('term.placeholder_parent') }}"
                        style="width: 100%;"></select>
            </div>
            <div class="form-group">
                <label for="name">{{ __('term.label_description') }}</label>
                <textarea name="description"
                          class="form-control"
                          rows="3"
                          placeholder="{{ __('term.placeholder_description') }}"
                          id="description"></textarea>
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
            <div class="form-group">
                <label for="image">{{ __('term.label_image') }}</label>
                <div class="upload-image" id="uploadImage">
                    <input id="upload" type="file" name="image" value="{{ __('general.choose_a_file') }}" accept="image/*"
                           data-role="none" hidden>
                    <input type="hidden" name="isupload">
                    <div class="col-md-12">
                        <div class="upload-msg">{{ __('general.placeholder_image_upload') }}</div>
                        <div id="display">
                            <img id="image_preview_container" src="#" alt="{{ __('general.preview_image') }}"
                                 style="width: 100%;">
                        </div>
                        <div class="buttons text-center mt-3">
                            <button id="reset" type="button"
                                    class="reset btn btn-sm btn-danger">{{ __('general.remove_image') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button id="btn-reset" type="button" class="btn btn-warning" hidden>{{ __('term.button_cancel') }}</button>
            <button id="btn-submit" type="submit" class="btn btn-info float-right">{{ __('term.button_category_submit') }}</button>
        </div>
    </form>
</div>
