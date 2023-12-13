<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('analytics.title_most_visited_pages') }}</h3>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('analytics.column_page') }}</th>
                    <th>{{ __('analytics.column_pageviews') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($mostVisited as $i => $v)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td><a href="{{ $v['url'] }}" target="_blank">{{ $v['pageTitle'] }}</a></td>
                        <td>{{ $v['pageViews'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
