<script>
    "use strict";

    // UPLOAD IMAGE


    const element = document.querySelector(".upload-image");
    $('input[name=isupload]').val(element.classList.contains("ready"));

    $(document).on('click', '.upload-msg', function() {
        $("#upload").trigger("click");
    });

    $(document).on('click', '#reset', function() {
        resetFileUpload();
    });

    function resetFileUpload() {
        $('#display').removeAttr('hidden');
        $('#reset').attr('hidden');
        $('.upload-image').removeClass('ready result');
        $('#image_preview_container').attr('src', 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D');
        $('#upload')[0].value = '';
        $('input[name=isupload]').val("remove");
    }

    function readFile(input) {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.upload-image').addClass('ready');
            $('#image_preview_container').attr('src', e.target.result);
            $('input[name=isupload]').val("true");
        };
        reader.readAsDataURL(input.files[0]);
    }

    $(document).on('change', '#upload', function() {
        readFile(this);
    });

    // SELECT CATEGORY
    $('#parent').select2({
        theme: 'bootstrap4',
        allowClear: true,
        ajax: {
            url: '{{ route('categories.category.search') }}',
            dataType: 'json',
            data: function (params) {
                let query = {
                    q: params.term,
                    lang: $('#custom-filter').val()
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: data.map(function (item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                }
            },
            cache: true
        }
    });

    var items = "";
    $.getJSON("{{ route('getdatalanguage') }}", function (result) {
        $.each(result, function (i, item) {
            if (item.language_code == "{{ Auth::user()->language }}") {
                items += "<option value='" + item.id + "' selected>" + item.language + "</option>";
            } else {
                items += "<option value='" + item.id + "'>" + item.language + "</option>";
            }
        });
        $("#custom-filter").html(items);
    });

    function hideTranslation(name) {
        $("#hide-translation").html("{{ __('term.button_add_translation') }}");

        if (name) {
            $('#container-translation').empty();
            $("#hide-translation").attr('onclick', 'showTranslation(' + JSON.stringify(name) + ')');
        } else {
            $('#container-translation').empty();
            $("#hide-translation").attr("onclick", "showTranslation()");
        }

        $("#hide-translation").attr("id", "translation");
    }

    function showTranslation(name) {
        let lang = $("#custom-filter").val();
        let data = '{!! Languages::get() !!}';

        $("#translation").html("{{ __('term.button_hide_translation') }}");

        if (name) {
            $("#translation").attr('onclick', 'hideTranslation(' + JSON.stringify(name) + ')');
        } else {
            $("#translation").attr("onclick", "hideTranslation()");
        }

        $("#translation").attr("id", "hide-translation");

        let html = [];

        $.each(JSON.parse(data), function (i, item) {
            if (item.id != lang) {
                html[i] = '<div class="input-group mb-3">' +
                    '<div class="input-group-prepend">' +
                    '<span class="input-group-text text-code-' + item.language_code + '">' +
                    item.language_code.toUpperCase() +
                    '</span>' +
                    '</div>';
                if (name) {
                    if (name[item.language_code]) {
                        html[i] += '<input type="text" id="translation-' + item.language_code + '" class="form-control" name="translation[' + item.language_code + ']" placeholder="' + item.language + '" value="' + name[item.language_code] + '">'
                    } else {
                        html[i] += '<input type="text" id="translation-' + item.language_code + '" class="form-control" name="translation[' + item.language_code + ']" placeholder="' + item.language + '">'
                    }
                } else {
                    html[i] += '<input type="text" id="translation-' + item.language_code + '" class="form-control" name="translation[' + item.language_code + ']" placeholder="' + item.language + '">'
                }
                html[i] += ' <div class="invalid-feedback msg-error-translation-' + item.language_code + '"></div>';
                html[i] += '</div>';
            }
        });
        $('#container-translation').empty().append(html);
    }

    function clearBox() {
        $("input[type=text]").val("");
        $("#slug").html("");
        $("#parent").html("");
        $("#description").val("");
        $("#container-translation").html("");
        $("#btn-reset").attr("hidden", true);
        $("input[type=text]").removeClass("is-invalid");
        $(".invalid-feedback").html("");
        $("#btn-reset").attr("hidden", true);
        $("button[type=submit]").attr("id", "btn-submit").html("{{ __('term.button_category_submit') }}");
        $('input[type="file"]').val('').clone(true);

        if (document.getElementById('hide-translation')) {
            $("#hide-translation").attr("onclick", "showTranslation()");
            $("#hide-translation").html("{{ __('term.button_add_translation') }}");
            $("#hide-translation").attr("id", "translation");
        }
    }

    function changeValLang() {
        let lang = $("#custom-filter").val();
        $("input[name=language]").val(lang);
    }

    document.querySelector('button#btn-reset').addEventListener('click', () => {
        $(".card-form.card-title").html("{{ __('term.button_category_submit') }}");
        $("form#insert").removeAttr("href");
        $("#description").val("");
        $("input[type=text]").val("");
        $("#name").removeClass("is-invalid");
        $(".msg-error-name").html("");
        $("#btn-reset").attr("hidden", true);
        $("button[type=submit]").attr("id", "btn-submit").html("{{ __('term.button_category_submit') }}");
        clearBox();
        resetFileUpload();
    });

    $(document).on("click", "#btn-submit-update", function (e) {
        e.preventDefault();
        $("#update button[type=submit]").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $("input").removeClass("is-invalid")
        $(".invalid-feedback").html("");

        let editurl = $("form#insert").attr("href"),
        data = new FormData($('#insert')[0]);
        data.append('_method', 'PUT');

        $.ajax({
            url: editurl,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function (response) {
                if (response.errors) {
                    $("#name").addClass("is-invalid");
                    $(".msg-error-name").html(response.errors.name);
                    $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                    $("#btn-reset").removeAttr("hidden");
                } else if (response.error_required) {
                    $("#name").addClass("is-invalid");
                    $(".msg-error-name").html(response.error_required);
                    $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                    $("#btn-reset").removeAttr("hidden");
                } else if (response.error_exists) {
                    $('input[name="name[' + response.error_exists_lang + ']"').addClass("is-invalid");
                    $('.msg-error-name-' + response.error_exists_lang).html(response.error_exists);
                    $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                    $("#btn-reset").removeAttr("hidden");
                } else {
                    $(".spinner-grow").attr("hidden");
                    notification(response);
                    $("#category-table").DataTable().ajax.reload();
                    $("input[type=text]").val("");
                    $("#description").val("");
                    $("#insert button[type=submit]").html("{{ __('term.button_category_submit') }}");
                    $("#update").attr("id", "insert");
                    $("#btn-reset").attr("hidden", true);
                    clearBox();
                    resetFileUpload();
                }
            },
            error: function (resp) {
                $(".spinner-grow").attr("hidden");
                toastr.error(resp.responseJSON.message);
                $("#category-table").DataTable().ajax.reload();
                $("input[type=text]").val("");
                $("#description").val("");
                $("#insert button[type=submit]").html("{{ __('term.button_category_submit') }}");
                $("#update").attr("id", "insert");
                $("#btn-reset").attr("hidden", true);
                $("form#insert").removeAttr("href");
                $("#btn-submit-update").attr("id", "btn-submit");
            }
        });
    });

    $(document).on("click", "#btn-submit", function (e) {
        e.preventDefault();
        $("#insert button[type=submit]").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $("input").removeClass("is-invalid")
        $(".invalid-feedback").html("");

        let form  = $("#insert")[0];
        let formData = new FormData(form);

        $.ajax({
            url: "{{ route('categories.store') }}",
            method: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                if (response.errors) {
                    $("#name").addClass("is-invalid");
                    $(".msg-error-name").html(response.errors.name);
                    $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                    $("#btn-reset").removeAttr("hidden");
                } else if (response.error_exists) {
                    $("#name").addClass("is-invalid");
                    $(".msg-error-name").html(response.error_exists);
                    $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                    $("#btn-reset").removeAttr("hidden");
                } else if (response.error_required) {
                    $("#name").addClass("is-invalid");
                    $(".msg-error-name").html(response.error_required);
                    $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                    $("#btn-reset").removeAttr("hidden");
                } else if (response.error_translation_exists) {
                    $('input[name="translation[' + response.error_exists_lang + ']"').addClass("is-invalid");
                    $('.msg-error-translation-' + response.error_exists_lang).html(response.error_translation_exists);
                    $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                    $("#btn-reset").removeAttr("hidden");
                } else {
                    $(".spinner-grow").attr("hidden");
                    notification(response);
                    $("#category-table").DataTable().ajax.reload();
                    $("input[type=text]").val("");
                    $("#description").val("");
                    $("#insert button[type=submit]").html("{{ __('term.button_category_submit') }}");
                    clearBox();
                    resetFileUpload();

                }
            }
        });
    });
</script>
