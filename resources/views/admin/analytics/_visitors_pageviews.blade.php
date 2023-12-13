<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('analytics.title_visitor_&_pageview') }}</h3>
        <div class="card-tools">
            <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    {{ $label_day_visitor }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu" id="session_by_device">
                    <a href="javascript:;" class="dropdown-item choice" onclick="visitorPageView(0);">{{ __('analytics.today') }}</a>
                    <a href="javascript:;" class="dropdown-item choice" onclick="visitorPageView(1);">{{ __('analytics.yesterday') }}</a>
                    <a href="javascript:;" class="dropdown-item choice" onclick="visitorPageView(7);">{{ __('analytics.last_7_days') }}</a>
                    <a href="javascript:;" class="dropdown-item choice" onclick="visitorPageView(28);">{{ __('analytics.last_28_days') }}</a>
                    <a href="javascript:;" class="dropdown-item choice" onclick="visitorPageView(90);">{{ __('analytics.last_90_days') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <!-- Chart's container -->
        <div id="chart" style="height: 300px;"></div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                    <h5 class="description-header">{{ $pageviews_this_year }}</h5>
                    <span class="description-text">{{ __('analytics.pageviews') }} ({{ \Carbon\Carbon::now()->year }})</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                    <h5 class="description-header">{{ $visitors_this_year }}</h5>
                    <span class="description-text">{{ __('analytics.visitors') }} ({{ \Carbon\Carbon::now()->year }})</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                    <h5 class="description-header">{{ $pageviews }}</h5>
                    <span class="description-text">{{ __('analytics.pageviews') }}</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
                <div class="description-block">
                    <h5 class="description-header">{{ $visitors }}</h5>
                    <span class="description-text">{{ __('analytics.visitors') }}</span>
                </div>
                <!-- /.description-block -->
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
