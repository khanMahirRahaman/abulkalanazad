<div class="card card-info">
    <div class="card-body">
        <form class="form-inline" action="{{ route('menusshow') }}" method="POST" role="form">
            @csrf
            <div class="form-group mb-2">
                <label>Menu</label>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <select name="menu" class="form-control">
                    @foreach($menuoptions as $menuid => $name)
                        @if($id == $menuid)
                            <option value="{{ $menuid }}" selected>{{ $name }}</option>
                        @else
                            <option value="{{ $menuid }}">{{ $name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-info mb-2">Select Menu</button>
        </form>
    </div>
</div>
