<div class="tab-pane fade" id="web-permalinks" role="tabpanel" aria-labelledby="web-permalinks-tab">
    <form id="form-web-permalinks" action="{{ route('settings.update') }}" method="POST" role="form">
        @method('PATCH')
        @csrf
        <input type="hidden" name="web_permalinks">
        <h5>{{  __('setting.title_post_permalinks') }}</h5>
        <hr>
        <div class="form-group">
            <div class="icheck-primary d-inline">
                <input type="radio" id="postname" name="permalink" value="post_name" {{ $setting->key('permalink') === 'post_name' ? 'checked' : '' }}>
                <label for="postname">
                    {{ __('setting.label_postname') }}
                </label>
                <code>{{ url('/') }}/sample-post</code>
            </div>
        </div>
        <div class="form-group">
            <div class="icheck-primary d-inline">
                <input type="radio" id="dayandname" name="permalink" value="%year%/%month%/%day%" {{ $setting->key('permalink') === '%year%/%month%/%day%' ? 'checked' : '' }}>
                <label for="dayandname">
                    {{ __('setting.label_day&name') }}
                </label>
                <code>{{ url('/') }}/{{ now()->year }}/{{ now()->month }}/{{ now()->day }}/sample-post</code>
            </div>
        </div>
        <div class="form-group">
            <div class="icheck-primary d-inline">
                <input type="radio" id="monthandname" name="permalink" value="%year%/%month%" {{ $setting->key('permalink') === '%year%/%month%' ? 'checked' : '' }}>
                <label for="monthandname">
                    {{ __('setting.label_month&name') }}
                </label>
                <code>{{ url('/') }}/{{ now()->year }}/{{ now()->month }}/sample-post</code>
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
                <input type="radio" id="custom" name="permalink" value="custom" {{ $setting->key('permalink_type') === 'custom' ? 'checked' : '' }}>
                <label for="custom" style="line-height: inherit">
                    {{ __('setting.label_post_custom') }}
                </label>
                <code>{{ url('/') }}/</code>
                @if($setting->key('permalink_type') == 'custom')
                    <input type="text" class="form-control-custom" value="{{ $setting->key('permalink') }}" name="custom_input">
                @else
                    <input type="text" class="form-control-custom" value="{{ $setting->key('permalink_old') }}" name="custom_input">
                @endif

                <code>/sample-post</code>
            </div>
        </div>

        <div class="row mt-3">&nbsp;</div>

        <h5>{{ __('setting.title_page_permalinks') }}</h5>
        <hr>
        <div class="form-group">
            <div class="icheck-primary d-inline">
                <input type="radio" id="pagename" name="page_permalink_type" value="page_name" {{ $setting->key('page_permalink_type') === 'page_name' ? 'checked' : '' }}>
                <label for="pagename">
                    {{ __('setting.label_pagename') }}
                </label>
                <code>{{ url('/') }}/sample-page</code>
            </div>
        </div>
        <div class="form-group">
            <div class="icheck-primary d-inline">
                <input type="radio" id="withprefix" name="page_permalink_type" value="with_prefix" {{ $setting->key('page_permalink_type') === 'with_prefix' ? 'checked' : '' }}>
                <label for="withprefix">
                    {{ __('setting.label_page_with_prefix') }}
                </label>
                <code>{{ url('/') }}/page/sample-page</code>
            </div>
        </div>

        <div class="row mt-3">&nbsp;</div>

        <h5>{{ __('setting.title_category_permalinks') }}</h5>
        <hr>
        <div class="form-group">
            <div class="icheck-primary d-inline">
                <input type="radio" id="categoryname" name="category_permalink_type" value="category_name" {{ $setting->key('category_permalink_type') === 'category_name' ? 'checked' : '' }}>
                <label for="categoryname">
                    {{ __('setting.label_category_name') }}
                </label>
                <code>{{ url('/') }}/sample-category</code>
            </div>
        </div>
        <div class="form-group">
            <div class="icheck-primary d-inline">
                <input type="radio" id="withprefixcategory" name="category_permalink_type" value="with_prefix_category" {{ $setting->key('category_permalink_type') === 'with_prefix_category' ? 'checked' : '' }}>
                <label for="withprefixcategory">
                    {{ __('setting.label_category_with_prefix') }}
                </label>
                <code>{{ url('/') }}/category/sample-category</code>
            </div>
        </div>

        <div class="mt-3">
            <button id="submit-web-permalinks" type="submit" class="btn btn-info float-right">{{ __('setting.button_submit') }}</button>
        </div>
    </form>
</div>
