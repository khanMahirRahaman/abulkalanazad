<div class="tab-pane fade" id="web-backup" role="tabpanel" aria-labelledby="web-backup-tab">
    <div class="form-group">
        <label>{{ __('setting.label_export') }}</label>
        <div>
            <button type="button" id="btn-export" class="btn btn-info">
                <i class="fas fa-file-excel"></i> {{ __('setting.button_download_data') }}
            </button>
            <button type="button" id="btn-export-storage" class="btn btn-info">
                <i class="fas fa-download"></i> {{ __('setting.button_download_backup') }}
            </button>
        </div>
    </div>
    <hr>
    <form id="formUploadImport" action="{{ route('import') }}" method="POST" role="form" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="">{{ __('setting.label_import') }}</label><br>
            <div class="input-group">
                <div class="custom-file">
                    <input id="InputFileBackup" type="file" name="import" class="custom-file-input" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                    <label class="custom-file-label">{{ __('setting.placeholder_import') }}</label>
                </div>
            </div>
            <p>
                <small>
                    {{ __('setting.help_import') }}<br>
                </small>
            </p>
        </div>
        <button id="uploadFileBackup" type="submit" class="btn btn-info" disabled>
            {{ __('setting.button_upload') }}
        </button>
    </form>
</div>
