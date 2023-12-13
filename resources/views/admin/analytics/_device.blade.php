<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('analytics.title_sessions_by_device') }}</h3>
        <div class="card-tools">
            <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    {{ $label_day }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu" id="session_by_device">
                    <a href="javascript:;" class="dropdown-item choice" onclick="sessionByDevice(0);">{{ __('analytics.today') }}</a>
                    <a href="javascript:;" class="dropdown-item choice" onclick="sessionByDevice(1);">{{ __('analytics.yesterday') }}</a>
                    <a href="javascript:;" class="dropdown-item choice" onclick="sessionByDevice(7);">{{ __('analytics.last_7_days') }}</a>
                    <a href="javascript:;" class="dropdown-item choice" onclick="sessionByDevice(28);">{{ __('analytics.last_28_days') }}</a>
                    <a href="javascript:;" class="dropdown-item choice" onclick="sessionByDevice(90);">{{ __('analytics.last_90_days') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <!-- Chart's container -->
        <div id="deviceChart" style="height: 300px;"></div>
    </div>
    <div class="card-footer">
        <div class="row">
            @empty($devices)
                <div class="col-lg col-{{ $col }}">
                    <div class="description-block">
                        <h5 class="description-header">0</h5>
                        <span class="description-text">desktop</span>
                    </div>
                    <!-- /.description-block -->
                </div>
            @else
                @foreach($devices as $name => $total)
                    <div class="col-lg col-{{ $col }}">
                        <div class="description-block">
                            <h5 class="description-header">{{ $total }}</h5>
                            <span class="description-text">{{ $name }}</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                @endforeach
            <!-- /.col -->
            @endempty
        </div>
        <!-- /.row -->
    </div>
</div>
