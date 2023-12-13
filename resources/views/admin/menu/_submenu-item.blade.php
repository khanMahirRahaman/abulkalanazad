<ol class="dd-list">
    @foreach( $childs as $child )
        <li class="dd-item" data-id="{{ $child->id }}">
            <div class="dd-handle">
                <span class="drag-handle"><i class="fas fa-grip-vertical"></i></span>
                {{ $child->label }}
                <div class="dd-nodrag btn-group ml-auto">
                    <button type="button" class="btn btn-xs btn-default" onclick="event.preventDefault(); edit({{ $child->id }})">{{ __('Edit') }}</button>
                    <button type="button" class="btn btn-sm btn-default" onclick="event.preventDefault(); delete({{ $child->id }})"><i class="far fa-trash-alt"></i></button>
                </div>
            </div>
            @if(count($child->child))
                @include('admin.menu._submenu-item',['childs' => $child->child])
            @endif
        </li>
    @endforeach
</ol>
