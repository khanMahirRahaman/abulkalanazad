<script>
    "use strict";

    var items = "";
    $.getJSON("{{ route('getdatalanguage') }}", function(result) {
        $.each(result, function(i, item) {
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

        $.each(JSON.parse(data), function(i, item) {
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
        $("#description").val("");
        $("#container-translation").html("");
        $("#btn-reset").attr("hidden", true);
        $("input[type=text]").removeClass("is-invalid");
        $(".invalid-feedback").html("");
        $("#btn-reset").attr("hidden", true);
        $("button[type=submit]").attr("id", "btn-submit").html("{{ __('term.button_tag_submit') }}");

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

    $(document).on("click", "#btn-reset", function(e) {
        $(".card-form.card-title").html("{{ __('term.button_tag_submit') }}");
        $("form#insert").removeAttr("href");
        $("#name").val("");
        $("#description").val("");
        $("input[name]").val("");
        $("#name").removeClass("is-invalid");
        $(".msg-error-name").html("");
        $("#btn-reset").attr("hidden", true);
        $("button[type=submit]").attr("id", "btn-submit").html("{{ __('term.button_tag_submit') }}");
        clearBox();
    });

    $(document).on("click", "#btn-submit-update", function(e) {
        e.preventDefault();
        $("#update button[type=submit]").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $("input").removeClass("is-invalid")
        $(".invalid-feedback").html("");

        var data = new FormData($('#insert')[0]);
        data.append('_method', 'PUT');

        let editurl = $("form#insert").attr("href");
        $.ajax({
            url: editurl,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function(response) {
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
                    $("#tag-table").DataTable().ajax.reload();
                    $("input[type=text]").val("");
                    $("#description").val("");
                    $("#insert button[type=submit]").html("{{ __('term.button_tag_submit') }}");
                    $("#update").attr("id", "insert");
                    $("#btn-reset").attr("hidden", true);
                    clearBox();
                }
            },
            error: function(resp) {
                $(".spinner-grow").attr("hidden");
                toastr.error(resp.responseJSON.message);
                $("#tag-table").DataTable().ajax.reload();
                $("input[type=text]").val("");
                $("#description").val("");
                $("#insert button[type=submit]").html("{{ __('term.button_tag_submit') }}");
                $("#update").attr("id", "insert");
                $("#btn-reset").attr("hidden", true);
                $("form#insert").removeAttr("href");
                $("#btn-submit-update").attr("id", "btn-submit");
            }
        });
    });

    $(document).on("click", "#btn-submit", function(e) {
        e.preventDefault();
        $("#insert button[type=submit]").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $("#name").removeClass("is-invalid")
        $(".msg-error-name").html("");

        let lang = $("#custom-filter").val();

        $.ajax({
            url: "{{ route('tags.store') }}",
            method: 'POST',
            data: $("#insert").serialize(),
            success: function(response) {
                if (response.errors) {
                    $("#name").addClass("is-invalid");
                    $(".msg-error-name").html(response.errors.name);
                    $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                    $("#btn-reset").removeAttr("hidden");
                } else if (response.error_translation_exists) {
                    $('input[name="translation[' + response.error_exists_lang + ']"').addClass("is-invalid");
                    $('.msg-error-translation-' + response.error_exists_lang).html(response.error_translation_exists);
                    $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                    $("#btn-reset").removeAttr("hidden");
                } else {
                    $(".spinner-grow").attr("hidden");
                    $("#tag-table").DataTable().ajax.reload();
                    $("input[type=text], #description").val("");
                    $("#container-translation").html("");
                    $("#insert button[type=submit]").html("{{ __('term.button_tag_submit') }}");
                    $("#btn-reset").attr("hidden", true);
                    notification(response);
                }
            }
        });
    });
</script>
