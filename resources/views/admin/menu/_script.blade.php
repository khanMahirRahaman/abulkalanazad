<script>
    "use strict";

    $('#language').select2({
        theme: "bootstrap4",
        minimumResultsForSearch: 5,
    });

    $(document).on("change", "#language", function(e) {
        e.preventDefault();
        let data = $('select#language').find(':selected').val();
        let menu_id = $('input#menuid').val();
        $.ajax({
            url: "{{ route('menus.select.language', ['menu_id' => $id]) }}",
            data: {
                'language': data
            },
            success: function(resp){
                window.location.href = "/admin/manage/menus/"+menu_id+"/lang/"+resp.lang;
            }
        })
    });

    function loadMenuStructure(){
        const xhr = new XMLHttpRequest();
        const container = document.getElementById('menulist');

        xhr.onload = function() {
            if (this.status == 200){
                container.innerHTML = xhr.responseText;
            }else{
                console.warn('Did not receive 200 OK from response');
            }
        }

        let id = $('input#menuid').val();
        let lang = '{{ Languages::showCodeLanguage($lang_id) }}';
        let url_get = '{{ route("menulist", ['menu_id'=>':id','lang'=>':lang']) }}';

        url_get = url_get.replace(':id', id).replace(':lang', lang);
        xhr.open('get', url_get );
        xhr.send();
    }

    loadMenuStructure();

    $(function () {
        $('.dd').nestable();
        $('.dd').on('change', function () {
            let $this = $(this);
            let serializedData = window.JSON.stringify($($this).nestable('serialize'));
            $this.parents('div.card-default').find('input#menuitem').val(serializedData);
        });
    });

    function removeClassCSS() {
        $(".form-group").filter(function () {
            return $(this).children("#class").length > 0;
        }).remove();
    }

    function classCss(val) {
        $('#insert .card-body').append('<div class="form-group">' +
            '<label for="class">{{ __("menu.label_class") }}</label>' +
            '<input type="text" name="class" class="form-control" id="class" placeholder="" value="'+val+'" required autofocus>' +
            '<div class="invalid-feedback msg-error-class"></div>' +
            '</div>');
    }

    function sweetalertRemoveItem(url) {
        Swal.fire({
            width: "25rem",
            title: "{{__('general.are_you_sure')}}",
            text: "{!! __('general.you_wont_be_able_to_revert_this') !!}",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "{{__('general.yes_delete_it')}}",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    method: "DELETE",
                    success: function(response) {
                        if (response.success) {
                            loadMenuStructure();
                            Swal.fire({
                                width: "22rem",
                                title: "{{__('general.deleted')}}",
                                text: response.success,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else if (response.info) {
                            toastr.info(response.info)
                        } else if (response.error) {
                            Swal.fire({
                                width: "22rem",
                                title: "{{__('general.authorize')}}",
                                text: response.error,
                                icon: "error",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            toastr.error(response.authorize)
                        }
                    },
                    error: function(response) {
                        toastr.error(response.responseJSON.message)
                    }
                });
            }
        });
    }

    function edit(id) {
        let url = '{{ route("menus.edititem", [$id, ":id"]) }}';
        let editUrl = '{{ route("menus.updateitemmenu", ":id") }}';
        url = url.replace(':id', id);
        editUrl = editUrl.replace(':id', id);

        $("form#insert").attr("href", editUrl);

        $.ajax({
            method: "GET",
            url: url,
        }).done(function(resp) {
            let data_class;

            $("#btn-reset").removeAttr("hidden");
            $("#insert button[type=submit]").attr("id","btn-submit-update").html("{{ __('menu.button_update') }}");

            $("#url").val(resp.data.link);
            $("#label").val(resp.data.label);

            if (resp.data.class == null) {
                data_class = '';
            } else {
                data_class = resp.data.class;
            }

            loadMenuStructure();
            if($('#class').length < 1){
                classCss(data_class);
            }
        });
    }

    function remove(url) {
        sweetalertRemoveItem(url);
    }

    $(document).on("click", "#btn-reset", function(e) {
        $(".card-form.card-title").html("{{ __('menu.button_submit') }}");
        $("form#insert").removeAttr("href");
        $("#url").val("");
        $("#label").val("");

        removeClassCSS();

        $("#url").removeClass("is-invalid");
        $("#label").removeClass("is-invalid");
        $(".msg-error-url").html("");
        $(".msg-error-label").html("");

        $("#btn-reset").attr("hidden", true)

        $("#insert button[type=submit]").attr("id", "btn-submit").html("{{ __('menu.button_submit') }}");
    });

    $(document).on("click", "#btn-submit-update", function(e) {
        e.preventDefault();
        $("#update button[type=submit]").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $("#name").removeClass("is-invalid");
        $(".msg-error-name").html("");

        let editurl = $("form#insert").attr("href");
        $.ajax({
            url: editurl,
            method: 'PUT',
            data: $("#insert").serialize(),
            success: function(response) {
                if (response.success) {
                    loadMenuStructure();
                    removeClassCSS();
                    $(".spinner-grow").attr("hidden");
                    $("input[type=text]").val("");
                    $("#insert button[type=submit]").attr("id", "btn-submit").html("{{ __('menu.button_submit') }}");
                    $("#btn-reset").attr("hidden", true)
                    addItemMenu(response.menu);

                } else if (response.errors) {
                    if (response.errors.label) {
                        $("#label").addClass("is-invalid");
                        $(".msg-error-label").html(response.errors.label);
                    }
                    if (response.errors.url) {
                        $("#url").addClass("is-invalid");
                        $("#url").addClass("is-invalid");
                    }
                    if (response.errors.class) {
                        $("#class").addClass("is-invalid");
                        $(".msg-error-class").html(response.errors.url);
                    }
                    $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                    $("#btn-reset").removeAttr("hidden");
                } else {
                    notification(response);
                    removeClassCSS();
                    $(".spinner-grow").attr("hidden");
                    $("input[type=text]").val("");
                    $("#insert button[type=submit]").attr("id", "btn-submit").html("{{ __('menu.button_submit') }}");
                    $("#btn-reset").attr("hidden", true)
                }
            },
        });
    });

    function addItemMenu(menu) {
        $('ol.dd-list:first').append('<li class="dd-item" data-id="'+menu.id+'">' +
            '<div class="dd-handle">' +
            '<span class="drag-handle"><i class="fas fa-grip-vertical"></i></span>' +
            menu.label +
            '<div class="dd-nodrag btn-group ml-auto">' +
            '<button type="button" class="btn btn-xs btn-default" onclick="event.preventDefault(); edit("'+menu.id+'")">{{ __('general.edit') }}</button> ' +
            '<button class="btn btn-sm btn-default" onclick="event.preventDefault(); delete("'+ menu.id+'")"><i class="far fa-trash-alt"></i></button>' +
            '</div>' +
            '</div>' +
            '</li>');
    }

    $('#insert').submit(function(e) {
        e.preventDefault();
        $("#insert button[type=submit]").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $("#url").removeClass("is-invalid")
        $("#label").removeClass("is-invalid")
        $(".msg-error-url").html("");
        $(".msg-error-label").html("");

        $.ajax({
            url: "{{ route('menus.storeitem') }}",
            method: 'POST',
            data: $("#insert").serialize(),
            success: function(response) {
                if (response.success) {
                    loadMenuStructure();
                    $(".spinner-grow").attr("hidden");
                    $("input[type=text]").val("");
                    removeClassCSS();
                    $("#insert button[type=submit]").html("{{ __('menu.button_submit') }}");
                    $("#btn-reset").attr("hidden", true)
                    addItemMenu(response.menu);
                } else if (response.errors) {
                    if (response.errors.label) {
                        $("#label").addClass("is-invalid")
                        $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                        $(".msg-error-label").html(response.errors.label);
                        $("#btn-reset").removeAttr("hidden");
                    }
                    if (response.errors.url) {
                        $("#url").addClass("is-invalid")
                        $("#insert button[type=submit]").html("{{ __('general.resending') }}");
                        $(".msg-error-url").html(response.errors.url);
                        $("#btn-reset").removeAttr("hidden");
                    }
                } else {
                    notification(response);
                    removeClassCSS();
                    $(".spinner-grow").attr("hidden");
                    $("input[type=text]").val("");
                    $("#insert button[type=submit]").html("{{ __('menu.button_submit') }}");
                    $("#btn-reset").attr("hidden", true)
                }
            }
        });
    });
</script>
