<div class="card card-default">
    <form id="insert" role="form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="menu" value="{{ $id }}">
        <input type="hidden" name="language" value="{{ $lang_id }}">
        <div class="card-header">
            <h3 class="card-title">{{ __('menu.title_add_menu_item') }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="url">{{ __('menu.label_url') }}</label>
                <input type="text" name="url" class="form-control" id="url" placeholder="" required autofocus>
                <div class="invalid-feedback msg-error-url"></div>
            </div>
            <div class="form-group">
                <label for="label">{{ __('menu.label_label') }}</label>
                <input type="text" name="label" class="form-control" id="label" placeholder="" required autofocus>
                <div class="invalid-feedback msg-error-label"></div>
            </div>
        </div>
        <div class="card-footer">
            <button id="btn-reset" type="button" class="btn btn-warning" hidden>{{ __('menu.button_cancel') }}</button>
            <button id="btn-submit" type="submit" class="btn btn-info float-right">{{ __('menu.button_menu_item_submit') }}</button>
        </div>
    </form>
</div>
