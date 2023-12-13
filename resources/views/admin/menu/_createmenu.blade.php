<div class="card card-default">
    <form id="insert" role="form" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{ __('menu.label_name') }}</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('menu.placeholder_name') }}" required autofocus>
                <div class="invalid-feedback msg-error-name"></div>
            </div>
        </div>
        <div class="card-footer">
            <button id="btn-reset" type="button" class="btn btn-warning" hidden>{{ __('menu.button_cancel') }}</button>
            <button id="btn-submit" type="submit" class="btn btn-info float-right">{{ __('menu.button_submit') }}</button>
        </div>
    </form>
</div>
