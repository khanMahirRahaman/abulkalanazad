<script>
    "use strict";
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

    $(function() {
        var groups = "";
        $.getJSON("{{ route('group.search') }}", function (result) {
            $.each(result, function (i, group) {
                if (group.group == "dashboard") {
                    groups += "<option value='" + group.group + "' selected>" + group.group + "</option>";
                } else {
                    groups += "<option value='" + group.group + "'>" + group.group + "</option>";
                }
            });
            $("#translation-group").html(groups);
            $("#translation-group").prepend("<option value='0' selected='selected'>View All Groups</option>");
        });

        $("<label style=\"display: inline-flex;vertical-align: middle;margin-bottom:0\">" +
            "<select class=\"form-control input-sm\" name=\"translation-group\" id=\"translation-group\" onChange=\"$(\'#translation-table\').DataTable().draw()\">" +
            "</select>" +
            "</label>").appendTo($('#translation-table_wrapper .buttonAction'));

    })

    $(document).on("click", "#submit-update", function(e) {
        console.log('test');
        e.preventDefault();
        let editUrl = $("form#edit-translation-modal").attr("href");
        $.ajax({
            url: editUrl,
            method: 'PUT',
            data: $("#edit-translation-modal").serialize(),
            success: function(response) {
                $("input[type=text]").val("");
                $('#modal-edit-translation'). modal('hide')
                $("#translation-table").DataTable().ajax.reload();
                toastr.success(response.success);
            }
        })
    })

    // GROUP
    $("#group").select2({
        theme:"bootstrap4",
        allowClear: true,
        selectOnClose: false,
        tokenSeparators: [",", " "],
        ajax: {
            url: "{{ route('group.search') }}",
            processResults: function(data) {
                return {
                    results: data.map(function(item) {
                        return {
                            id: item.group,
                            text: item.group
                        }
                    })
                }
            }
        }
    });

    // LANGUAGE
    $("#language").select2({
        theme:"bootstrap4",
        allowClear: true,
        selectOnClose: false,
        tokenSeparators: [",", " "],
        ajax: {
            url: "{{ route('getdatalanguage') }}",
            processResults: function(data) {
                return {
                    results: data.map(function(item) {
                        return {
                            id: item.language_code,
                            text: item.language
                        }
                    })
                }
            }
        }
    });
</script>
