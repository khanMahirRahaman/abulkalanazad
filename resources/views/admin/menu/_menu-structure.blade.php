<div class="card card-default">
    <form action="{{ route('menus.updatemenustructure', $id) }}" method="POST" role="form">
        @method('PUT')
        @csrf
        <input id="menuitem" type="hidden" name="menuitem" value="{{ $json }}">
        <input id="menuid" type="hidden" name="menuid" value="{{ $id }}">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title mr-auto">{{ __('menu.title_menu_structure') }}</h3>
            <div class="card-tools">
                <select id="language" class="form-control" name="language">
                    @foreach(Languages::showWithKeyId() as $id => $language)
                        @isset($lang_id)
                            @if($lang_id === $id)
                                <option value="{{ $id }}" selected>{{ $language }}</option>
                            @else
                                <option value="{{ $id }}">{{ $language }}</option>
                            @endif
                        @else
                            @if(Languages::showIdLangSession() === $id)
                                <option value="{{ $id }}" selected>{{ $language }}</option>
                            @else
                                <option value="{{ $id }}">{{ $language }}</option>
                            @endif
                        @endisset
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="dd nestable-with-handle">
                <ol id="menulist" class="dd-list"></ol>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">{{ __('menu.button_save') }}</button>
        </div>
    </form>
</div>
