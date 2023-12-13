@if(isset($menus))
    @foreach($menus as $menu)
        <li class="dd-item" data-id="{{ $menu->id }}">
            <div class="dd-handle">
                <span class="drag-handle"><i class="fas fa-grip-vertical"></i></span>
                {{ $menu->label }}
                <div class="dd-nodrag btn-group ml-auto">
                    <button type="button" class="btn btn-xs btn-default" onclick="event.preventDefault(); edit({{ $menu->id }})">
                        {{ __('menu.button_menu_item_edit') }}</button>
                    <button type="button" class="btn btn-sm btn-default" onclick="event.preventDefault(); remove('{{ route('deleteitemmenu', ['menu_id'=>$id,'id'=>$menu->id]) }}')"><i class="far fa-trash-alt"></i></button>
                </div>
            </div>
            @if(count($menu->child))
                @include('admin.menu._submenu-item', ['childs' => $menu->child])
            @endif
        </li>
    @endforeach
@endif
