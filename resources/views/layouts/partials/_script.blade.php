@isset($dataTable)
    {{ $dataTable->scripts() }}
@endisset

<script>
    "use strict";

    toastr.options.closeButton = true;

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": {{ csrf_token() }}
        }
    })

    function sweetalert2(table, url) {
        Swal.fire({
            width: "25rem",
            title: "{{ __('general.are_you_sure') }}",
            text: "{{ __('general.you_wont_be_able_to_revert_this') }}",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "{{ __('general.yes_delete_it') }}",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    method: "DELETE",
                    success: function(response) {
                        if (response.success) {
                            $("#" + table).DataTable().ajax.reload();
                            Swal.fire({
                                width: "22rem",
                                title: "{{ __('general.deleted') }}",
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
                                title: "{{ __('general.authorize') }}",
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
        })
    }

    function multiDelCheckbox(table, url, selectClass) {
        Swal.fire({
            width: "25rem",
            title: "{{ __('general.are_you_sure') }}",
            text: "{{ __('general.you_wont_be_able_to_revert_this') }}",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "{{ __('general.yes_delete_it') }}",
        }).then((result) => {
            if (result.value) {
                let id = [];
                $("."+selectClass+":checked").each(function(){
                    id.push($(this).val());
                });
                if(id.length > 0) {
                    $.ajax({
                        url: url,
                        method: "GET",
                        data: {id:id},
                        success: function(response) {
                            if (response.success) {
                                $("#" + table).DataTable().ajax.reload();
                                Swal.fire({
                                    width: "22rem",
                                    title: "{{ __('general.deleted') }}",
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
                                    title: "{{ __('general.authorize') }}",
                                    text: response.error,
                                    icon: "error",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else {
                                toastr.error(response.authorize)
                            }
                            $("#selectAll").prop("checked",false);
                            $("input[type=checkbox]").prop("checked",false);
                        }
                    });
                }else{
                    Swal.fire({
                        width: "22rem",
                        title: "Error!",
                        text: "{{ __('general.please_select_at_least_one_checkbox') }}",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    }

    @if(session('success'))
    notify('success', "{{ session('success') }}")
    @endif

    @if(session('info'))
    notify("info", "{{ session('info') }}")
    @endif

    @if(session('error'))
    notify("error", "{{ session('error') }}")
    @endif

    // success, error, info
    function notify(sign, message) {
        const sessionId = "{{ uniqid() }}";
        if (sessionStorage) {
            if (!sessionStorage.getItem('shown-' + sessionId)) {
                if (sign ===  "success") {
                    success(message)
                }
                if (sign === "error") {
                    error(message)
                }
                if (sign === "info") {
                    info(message)
                }
            }
            sessionStorage.setItem('shown-' + sessionId, '1');
        }
    }

    function success(message) {
        toastr.success(message);
    }

    function error(message) {
        toastr.error(message);
    }

    function info(message) {
        toastr.info(message);
    }

    // Toast
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    function alert_sweet_success(message) {
        Toast.fire({
            icon: 'success',
            type: 'success',
            title: message
        });
    }

    function alert_sweet_error(message) {
        Toast.fire({
            icon: 'error',
            type: 'error',
            title: message
        });
    }

    // function delete button
    function delBtn() {
        $(".confirm").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.deleting') }}");
        $.ajax({
            url: url,
            method: "DELETE",
            success: function(response) {
                console.log(response)
                $("#delete").modal("hide")
                alert_sweet_success(response.success);
                $("#" + table).DataTable().ajax.reload();
                $(".confirm").html("{{ __('general.delete') }}");
            }
        });
    }
</script>
