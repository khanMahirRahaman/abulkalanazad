<div class="card card-default">
    <form id="insert" action="" method="" role="form">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{ __('socialmedia.label_name') }}</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('socialmedia.placeholder_name') }}" required autofocus>
                <div class="invalid-feedback msg-error-name"></div>
            </div>
            <div class="form-group">
                <label for="url">{{ __('socialmedia.label_url') }}</label>
                <input type="text" name="url" class="form-control" id="url" placeholder="{{ __('socialmedia.placeholder_url') }}">
                <div class="invalid-feedback msg-error-url"></div>
            </div>
            <div class="form-group">
                <label for="icon">{{ __('socialmedia.label_icon') }}</label>
                <div class="input-group mb-3">
                    <input type="text" name="icon" class="form-control icp icp-auto" id="icon" data-placement="bottomRight" placeholder="{{ __('socialmedia.placeholder_icon') }}" aria-label="fas fa-globe" aria-describedby="basic-addon2" value="fas fa-globe">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"></span>
                    </div>
                </div>
                <div class="invalid-feedback msg-error-icon"></div>
            </div>
            <div class="form-group">
                <label for="color">{{ __('socialmedia.label_color') }}</label>
                <div id="cp2" class="input-group">
                    <input type="text" id="color" name="color" class="form-control" value="#666" placeholder="{{ __('socialmedia.placeholder_color') }}"/>
                    <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button id="btn-reset" type="button" class="btn btn-warning" hidden>{{ __('socialmedia.button_cancel') }}</button>
            <button id="btn-submit" type="submit"
                class="btn btn-info float-right">{{ __('socialmedia.button_submit') }}</button>
        </div>
    </form>
</div>
