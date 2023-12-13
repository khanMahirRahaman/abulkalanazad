<script>
    "use strict";

    $(document).on("change", "#site_language", function(e) {
        e.preventDefault();
        let dataLangCode = $('select#site_language').find(':selected').val() //get code;
        $.ajax({
            type: "PATCH",
            dataType: "json",
            url: "/admin/settings/change-theme-language",
            data: {
                'code': dataLangCode
            },
            success: function(response) {
                toastr.success(response.success);
                $("#site_language").select2("val", "");
            }
        })
    });

    function readImage(input) {
        let reader = new FileReader();
        let name = $(input).attr('name');
        reader.onload = (e) => {
            $('#image_preview_'+name).attr('src', e.target.result).removeClass('d-none');
            $('#image_'+name).hide();
        }
        reader.readAsDataURL(input.files[0]);
    }

    $(function() {
        bsCustomFileInput.init()
    });

    let editor = CodeMirror.fromTextArea(document.getElementById("credit_footer"), {
        mode: "htmlmixed",
        styleActiveLine: true,
        lineNumbers: true,
        lineWrapping: true,
        matchBrackets: true
    });
    editor.setSize(null, 100);
    editor.on('change', (editor) => {
        const text = editor.doc.getValue()
        $('#credit_footer').html(text);
    });

    $(document).on("click", "#submit-web-properties", function(e) {
        e.preventDefault();
        $("#submit-web-properties").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $.ajax({
            url: "{{ route('settings.update') }}",
            method: "POST",
            data: $("#form-web-information").serialize(),
            success: function(response) {
                if (response.errors) {
                    $(".spinner-grow").attr("hidden", true);
                    $("#submit-web-properties").html("{{ __('setting.button_submit') }}");
                    toastr.error(response.errors);
                } else if (response.info) {
                    $(".spinner-grow").attr("hidden", true);
                    toastr.info(response.info);
                    $("#submit-web-properties").html("{{ __('setting.button_submit') }}");
                } else {
                    $(".spinner-grow").attr("hidden", true);
                    toastr.success(response.success);
                    $("#submit-web-properties").html("{{ __('setting.button_submit') }}");
                }
            }
        });
    });

    $(document).on("click", "#submit-web-contact", function(e) {
        e.preventDefault();
        $("#submit-web-contact").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $("#name").removeClass("is-invalid")
        $(".msg-error-name").html("");
        $.ajax({
            url: "{{ route('settings.update') }}",
            method: "POST",
            data: $("#form-web-contact").serialize(),
            success: function(response) {
                if (response.errors) {
                    $(".spinner-grow").attr("hidden", true);
                    $("#submit-web-contact").html("{{ __('setting.button_submit') }}");
                    toastr.error(response.errors);
                } else if (response.info) {
                    $(".spinner-grow").attr("hidden", true);
                    toastr.info(response.info);
                    $("#submit-web-contact").html("{{ __('setting.button_submit') }}");
                } else {
                    $(".spinner-grow").attr("hidden", true);
                    toastr.success(response.success);
                    $("#submit-web-contact").html("{{ __('setting.button_submit') }}");
                }
            }
        });
    });

    $(document).on("click", "#submit-web-permalinks", function(e) {
        e.preventDefault();
        $("#submit-web-permalinks").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $("#name").removeClass("is-invalid")
        $(".msg-error-name").html("");
        $.ajax({
            url: "{{ route('settings.update') }}",
            method: "POST",
            data: $("#form-web-permalinks").serialize(),
            success: function(response) {
                if (response.errors) {
                    $(".spinner-grow").attr("hidden", true);
                    $("#submit-web-permalinks").html("{{ __('setting.button_submit') }}");
                    toastr.error(response.errors);
                } else if (response.info) {
                    $(".spinner-grow").attr("hidden", true);
                    toastr.info(response.info);
                    $("#submit-web-permalinks").html("{{ __('setting.button_submit') }}");
                } else {
                    $(".spinner-grow").attr("hidden", true);
                    toastr.success(response.success);
                    $("#submit-web-permalinks").html("{{ __('setting.button_submit') }}");
                }
            }
        });
    });

    $(document).on("change", "#customSwitch1", function(e) {
        let active = $(this).prop("checked") == true ? "y" : "n";
        $.ajax({
            type: "PATCH",
            dataType: "json",
            url: "/admin/settings/changeStatusMaintenance",
            data: {
                "active": active
            },
            success: function(data) {
                if(data.info) {
                    toastr.info(data.info);
                } else {
                    toastr.success(data.success);
                }
            }
        })
    });

    $(document).on("change", "#customSwitch2", function(e) {
        let active = $(this).prop("checked") == true ? "y" : "n";
        $.ajax({
            type: "PATCH",
            dataType: "json",
            url: "/admin/settings/changeRegisterMember",
            data: {
                "active": active
            },
            success: function(data) {
                if(data.info) {
                    toastr.info(data.info);
                } else if(data.success){
                    toastr.success(data.success);
                }else{
                    toastr.error(data.abort);
                }
            }
        })
    });

    $(document).on("change", "#customSwitch3", function(e) {
        let active = $(this).prop("checked") == true ? "y" : "n";
        $.ajax({
            type: "PATCH",
            dataType: "json",
            url: "/admin/settings/change-active-email-verification",
            data: {
                "active": active
            },
            success: function(data) {
                if(data.info) {
                    toastr.info(data.info);
                } else if(data.success){
                    toastr.success(data.success);
                }else{
                    toastr.error(data.abort);
                }
            }
        })
    });

    $(document).on("change", "#switchDisplayLanguage", function(e) {
        let active = $(this).prop("checked") == true ? "y" : "n";
        $.ajax({
            type: "PATCH",
            dataType: "json",
            url: "/admin/settings/switch-display-language",
            data: {
                "active": active
            },
            success: function(data) {
                if(data.info) {
                    toastr.info(data.info);
                } else if(data.success){
                    toastr.success(data.success);
                }else{
                    toastr.error(data.abort);
                }
            }
        })
    });

    $(document).ready(() => {
        let url = location.href.replace(/\/$/, "");

        if (location.hash) {
            const hash = url.split("#");
            $('#vert-tabs-tab a[href="#' + hash[1] + '"]').tab("show");
            url = location.href.replace(/\/#/, "#");
            history.replaceState(null, null, url);
            setTimeout(() => {
                $(window).scrollTop(0);
            }, 400);
        }

        $('a[data-toggle="pill"]').on("click", function() {
            let newUrl;
            const hash = $(this).attr("href");
            newUrl = url.split("#")[0] + hash;
            newUrl += "/";
            history.replaceState(null, null, newUrl);
        });
    });

    $('input[type=file]#InputFileBackup').change(function(){
        if($('input[type=file]#inputFileBackup').val()==''){
            $('button#uploadFileBackup').attr('disabled',true)
        }
        else{
            $('button#uploadFileBackup').attr('disabled',false);
        }
    })

    $(document).on("click", "#btn-export", function(e) {
        e.preventDefault();
        $("#btn-export").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $.ajax({
            url: "{{ route('export') }}",
            method: "GET",
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response){
                let name = "{{ config('retenvi.app_name') }}";
                let version = "{{ config('retenvi.version') }}";
                let ext = ".xlsx";
                let filename = name + "-v" + version + ext;
                let blob = new Blob([response]);
                let link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = filename;
                link.click();
                $(".spinner-grow").attr("hidden", true);
                $("#btn-export").html("<i class='fas fa-file-excel'></i> {{ __('setting.button_download_data') }}");
            }
        });
    })

    $(document).on("click", "#btn-export-storage", function(e) {
        e.preventDefault();
        $("#btn-export-storage").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $.ajax({
            url: "{{ route('export.storage') }}",
            method: "GET",
            cache: false,
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response){
                let name = "{{ config('retenvi.app_name') }}";
                let version = "{{ config('retenvi.version') }}";
                let ext = "storage.zip";
                let filename = name + "-v" + version + "-" + ext;
                let blob = new Blob([response]);
                let link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = filename;
                link.click();
                $(".spinner-grow").attr("hidden", true);
                $("#btn-export-storage").html("<i class='fas fa-file-excel'></i> {{ __('setting.button_download_data') }}");
            }
        });
    })

    $(document).on("click", "#uploadFileBackup", function(e) {
        e.preventDefault();
        $("#uploadFileBackup").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading')}}</span></div> {{ __('general.sending') }}");
        let url = $("#formUploadImport").attr("action");
        var form = $('#formUploadImport')[0];
        var data = new FormData(form);
        $.ajax({
            type: 'post',
            processData: false,
            contentType: false,
            enctype: "multipart/form-data",
            url: url,
            data: data,
            success: function(response) {
                $(".spinner-grow").attr("hidden", true);
                $("#formUploadImport")[0].reset();
                $("#uploadFileBackup").html("{{__('setting.button_upload')}}");
                if (response.errors) {
                    toastr.error(response.errors.import);
                } else if (response.info) {
                    toastr.info(response.info);
                } else {
                    toastr.success(response.success);
                }
            }
        })
    })

    function createInput(data) {
        $('.socmed').append('<div class="col-lg-6" id="socmed' + data.id + '">' +
            '<div class="form-group"><label> URL '+ data.name +'</label>' +
            '<div class="input-group mb-3">' +
            '<input type="hidden" name="socialmedia[' + data.id + '][id]" value="' + data.id + '">' +
            '<div class="input-group-prepend"><span class="input-group-text"> <i class="' + data.icon + '"></i></span></div>' +
                '<input type="text" name="socialmedia[' + data.id + '][url]" class="form-control" placeholder="" value="' + data.url + '">' +
                '<div class="input-group-append" onclick="removeInput(' + data.id + ')"><span class="input-group-text"><i class="fas fa-times"></i></span></div>' +
                '</div>' +
            '</div>' +
        '</div>');
    }

    function removeInput(id) {
        let input = document.getElementById("socmed" + id);
        input.remove();
    }

    $("select#socialmedia").on('change', function() {
        let dataID = $('select#socialmedia').find(':selected').val();
        $.ajax({
            url: '/admin/getsocmed',
            data: {
                'id': dataID
            },
            type: 'get',
            dataType: 'json',
            success: function(data) {
                if (!document.getElementById('socmed' + data.id)) {
                    createInput(data);
                }
            }
        });
    });

    $("select#socialmedia").select2({
        theme: "bootstrap4",
        selectOnClose: false,
        tokenSeparators: [",", " "],
        ajax: {
            url: "{{ route('socialmedia.search') }}",
            processResults: function(data) {
                return {
                    results: data.map(function(item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                }
            }
        }
    });

    $(document).on('click', '.symlink', function() {
        let status = '{{ Settings::key('symlink') }}';
        $.ajax({
            url: '{{ route('symlink') }}',
            type: 'GET',
            success: function(response) {
                notification(response);
                if(status == 'false'){
                    $('#symlink-create').attr('hidden', true);
                    $('#symlink-again').removeAttr('hidden');
                }
            }
        });
    });
</script>
