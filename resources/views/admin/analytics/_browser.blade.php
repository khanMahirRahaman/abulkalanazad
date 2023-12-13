<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('analytics.title_browser_used_by_users') }}</h3>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('analytics.column_browser') }}</th>
                    <th>{{ __('analytics.column_sessions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($topBrowsers as $i => $v)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $v['browser'] }}</td>
                        <td>{{ $v['sessions'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
