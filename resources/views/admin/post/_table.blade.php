<div class="card">
    <div class="card-header d-flex align-items-center">
        <h3 class="card-title mr-auto">{{ __('post.title_all_posts') }}</h3>
        <div class="card-tools">

            <select name="custom-filter" id="custom-filter" class="form-control input-sm" onChange="$('#post-table').DataTable().draw()"></select>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <input type="date" id="postDate" class="mb-2">
            {{ $dataTable->table([], true) }}
        </div>
    </div>
</div>

