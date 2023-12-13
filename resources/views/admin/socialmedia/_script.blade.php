<script>
    "use strict";

    $(document).on("click", "#btn-reset", function(e) {
        $("#name").val("")
        $("#url").val("")
        $("#icon").val("fas fa-globe")
        $("#color").val("#666")
        $("#basic-addon2").html("<i class='fas fa-globe'></i>")
        $("#cp2 i").css("background", "#666")
        $("#btn-reset").attr("hidden", true)
        $("input").removeClass("is-invalid")
        $("button[type=submit]").attr("id", "btn-submit").html("{{ __('socialmedia.button_submit') }}");
    });

    $(document).on("click", "#btn-update", function(e) {
        e.preventDefault();
        $("#update button[type=submit]").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $("#name").removeClass("is-invalid")
        $(".msg-error-name").html("");

        $.ajax({
            url: editurl,
            method: 'PUT',
            data: $("#insert").serialize(),
            success: function(response) {
                if (response.errors) {
                    if (response.errors.name) {
                        $("#name").addClass("is-invalid")
                        $("#url").addClass("is-invalid")
                        $("#icon").addClass("is-invalid")
                        $("#update button[type=submit]").html("{{ __('general.resending') }}");
                        $(".msg-error-name").html(response.errors.name);
                    }
                } else {
                    $(".spinner-grow").attr("hidden");
                    notification(response);
                    $("#socialmedia-table").DataTable().ajax.reload();
                    $("#name").val("")
                    $("#url").val("")
                    $("#icon").val("fas fa-globe")
                    $("#color").val("#666")
                    $("#basic-addon2").html("<i class='fas fa-globe'></i>")
                    $("#cp2 i").css("background", "#666");
                    $("#insert button[type=submit]").html("{{ __('socialmedia.button_submit') }}");
                    $("#update").attr("id", "insert");
                    $("#btn-reset").attr("hidden", true);
                }
            }
        });
    });

    $(document).on("click", "#btn-submit", function(e) {
        e.preventDefault();
        $("#insert button[type=submit]").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");

        $("#name, #url, #icon").removeClass("is-invalid")
        $(".msg-error-name").html("");

        $.ajax({
            url: "{{ route('socialmedia.store') }}",
            method: 'POST',
            data: $("#insert").serialize(),
            success: function(response) {
                if (response.errors) {
                    if (response.errors.name) {
                        $("#name").addClass("is-invalid")
                        $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                        $(".msg-error-name").html(response.errors.name);
                    }
                    if (response.errors.url) {
                        $("#url").addClass("is-invalid")
                        $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                        $(".msg-error-url").html(response.errors.url);
                    }
                    if (response.errors.icon) {
                        $("#icon").addClass("is-invalid")
                        $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                        $(".msg-error-icon").html(response.errors.icon);
                    }
                } else {
                    $(".spinner-grow").attr("hidden");
                    notification(response);
                    $("#socialmedia-table").DataTable().ajax.reload();
                    $("#name").val("")
                    $("#url").val("")
                    $("#icon").val("fas fa-globe")
                    $("#color").val("#666")
                    $("#basic-addon2").html("<i class='fas fa-globe'></i>")
                    $("#cp2 i").css("background", "#666");
                    $("#insert button[type=submit]").html("{{ __('socialmedia.button_submit') }}");
                }
            }
        });
    })
</script>
